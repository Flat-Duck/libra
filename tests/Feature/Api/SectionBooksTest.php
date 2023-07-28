<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Book;
use App\Models\Section;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SectionBooksTest extends TestCase
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
    public function it_gets_section_books(): void
    {
        $section = Section::factory()->create();
        $books = Book::factory()
            ->count(2)
            ->create([
                'section_id' => $section->id,
            ]);

        $response = $this->getJson(route('api.sections.books.index', $section));

        $response->assertOk()->assertSee($books[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_section_books(): void
    {
        $section = Section::factory()->create();
        $data = Book::factory()
            ->make([
                'section_id' => $section->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.sections.books.store', $section),
            $data
        );

        $this->assertDatabaseHas('books', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $book = Book::latest('id')->first();

        $this->assertEquals($section->id, $book->section_id);
    }
}
