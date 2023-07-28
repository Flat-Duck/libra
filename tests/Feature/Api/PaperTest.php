<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Paper;

use App\Models\Department;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaperTest extends TestCase
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
    public function it_gets_papers_list(): void
    {
        $papers = Paper::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.papers.index'));

        $response->assertOk()->assertSee($papers[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_paper(): void
    {
        $data = Paper::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.papers.store'), $data);

        $this->assertDatabaseHas('papers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_paper(): void
    {
        $paper = Paper::factory()->create();

        $department = Department::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'publisher' => $this->faker->text(255),
            'published_at' => $this->faker->dateTime(),
            'department_id' => $department->id,
        ];

        $response = $this->putJson(route('api.papers.update', $paper), $data);

        $data['id'] = $paper->id;

        $this->assertDatabaseHas('papers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_paper(): void
    {
        $paper = Paper::factory()->create();

        $response = $this->deleteJson(route('api.papers.destroy', $paper));

        $this->assertModelMissing($paper);

        $response->assertNoContent();
    }
}
