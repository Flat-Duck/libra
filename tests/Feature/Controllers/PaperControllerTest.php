<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Paper;

use App\Models\Department;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaperControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_papers(): void
    {
        $papers = Paper::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('papers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.papers.index')
            ->assertViewHas('papers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_paper(): void
    {
        $response = $this->get(route('papers.create'));

        $response->assertOk()->assertViewIs('app.papers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_paper(): void
    {
        $data = Paper::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('papers.store'), $data);

        $this->assertDatabaseHas('papers', $data);

        $paper = Paper::latest('id')->first();

        $response->assertRedirect(route('papers.edit', $paper));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_paper(): void
    {
        $paper = Paper::factory()->create();

        $response = $this->get(route('papers.show', $paper));

        $response
            ->assertOk()
            ->assertViewIs('app.papers.show')
            ->assertViewHas('paper');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_paper(): void
    {
        $paper = Paper::factory()->create();

        $response = $this->get(route('papers.edit', $paper));

        $response
            ->assertOk()
            ->assertViewIs('app.papers.edit')
            ->assertViewHas('paper');
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

        $response = $this->put(route('papers.update', $paper), $data);

        $data['id'] = $paper->id;

        $this->assertDatabaseHas('papers', $data);

        $response->assertRedirect(route('papers.edit', $paper));
    }

    /**
     * @test
     */
    public function it_deletes_the_paper(): void
    {
        $paper = Paper::factory()->create();

        $response = $this->delete(route('papers.destroy', $paper));

        $response->assertRedirect(route('papers.index'));

        $this->assertModelMissing($paper);
    }
}
