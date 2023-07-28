<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Paper;
use App\Models\Department;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartmentPapersTest extends TestCase
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
    public function it_gets_department_papers(): void
    {
        $department = Department::factory()->create();
        $papers = Paper::factory()
            ->count(2)
            ->create([
                'department_id' => $department->id,
            ]);

        $response = $this->getJson(
            route('api.departments.papers.index', $department)
        );

        $response->assertOk()->assertSee($papers[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_department_papers(): void
    {
        $department = Department::factory()->create();
        $data = Paper::factory()
            ->make([
                'department_id' => $department->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.departments.papers.store', $department),
            $data
        );

        $this->assertDatabaseHas('papers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $paper = Paper::latest('id')->first();

        $this->assertEquals($department->id, $paper->department_id);
    }
}
