<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Section;
use App\Models\Department;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartmentSectionsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_department_sections(): void
    {
        $department = Department::factory()->create();
        $sections = Section::factory()
            ->count(2)
            ->create([
                'department_id' => $department->id,
            ]);

        $response = $this->getJson(
            route('api.departments.sections.index', $department)
        );

        $response->assertOk()->assertSee($sections[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_department_sections(): void
    {
        $department = Department::factory()->create();
        $data = Section::factory()
            ->make([
                'department_id' => $department->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.departments.sections.store', $department),
            $data
        );

        $this->assertDatabaseHas('sections', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $section = Section::latest('id')->first();

        $this->assertEquals($department->id, $section->department_id);
    }
}
