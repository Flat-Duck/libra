<?php

namespace App\Http\Controllers\Api;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResource;
use App\Http\Resources\SectionCollection;

class DepartmentSectionsController extends Controller
{
    public function index(
        Request $request,
        Department $department
    ): SectionCollection {
        $this->authorize('view', $department);

        $search = $request->get('search', '');

        $sections = $department
            ->sections()
            ->search($search)
            ->latest()
            ->paginate();

        return new SectionCollection($sections);
    }

    public function store(
        Request $request,
        Department $department
    ): SectionResource {
        $this->authorize('create', Section::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
        ]);

        $section = $department->sections()->create($validated);

        return new SectionResource($section);
    }
}
