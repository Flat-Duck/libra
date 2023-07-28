<?php

namespace App\Http\Controllers\Api;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaperResource;
use App\Http\Resources\PaperCollection;

class DepartmentPapersController extends Controller
{
    public function index(
        Request $request,
        Department $department
    ): PaperCollection {
        $this->authorize('view', $department);

        $search = $request->get('search', '');

        $papers = $department
            ->papers()
            ->search($search)
            ->latest()
            ->paginate();

        return new PaperCollection($papers);
    }

    public function store(
        Request $request,
        Department $department
    ): PaperResource {
        $this->authorize('create', Paper::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'publisher' => ['required', 'max:255', 'string'],
            'published_at' => ['required', 'date'],
        ]);

        $paper = $department->papers()->create($validated);

        return new PaperResource($paper);
    }
}
