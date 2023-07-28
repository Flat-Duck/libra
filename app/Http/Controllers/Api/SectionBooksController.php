<?php

namespace App\Http\Controllers\Api;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;

class SectionBooksController extends Controller
{
    public function index(Request $request, Section $section): BookCollection
    {
        $this->authorize('view', $section);

        $search = $request->get('search', '');

        $books = $section
            ->books()
            ->search($search)
            ->latest()
            ->paginate();

        return new BookCollection($books);
    }

    public function store(Request $request, Section $section): BookResource
    {
        $this->authorize('create', Book::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'author' => ['required', 'max:255', 'string'],
            'published_at' => ['required', 'date'],
            'publication_place' => ['required', 'max:255', 'string'],
        ]);

        $book = $section->books()->create($validated);

        return new BookResource($book);
    }
}
