<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PaperStoreRequest;
use App\Http\Requests\PaperUpdateRequest;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Paper::class);

        $search = $request->get('search', '');

        $papers = Paper::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.papers.index', compact('papers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Paper::class);

        $departments = Department::pluck('name', 'id');

        return view('app.papers.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaperStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Paper::class);

        $validated = $request->validated();

        $paper = Paper::create($validated);

        return redirect()
            ->route('papers.edit', $paper)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Paper $paper): View
    {
        $this->authorize('view', $paper);

        return view('app.papers.show', compact('paper'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Paper $paper): View
    {
        $this->authorize('update', $paper);

        $departments = Department::pluck('name', 'id');

        return view('app.papers.edit', compact('paper', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PaperUpdateRequest $request,
        Paper $paper
    ): RedirectResponse {
        $this->authorize('update', $paper);

        $validated = $request->validated();

        $paper->update($validated);

        return redirect()
            ->route('papers.edit', $paper)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Paper $paper): RedirectResponse
    {
        $this->authorize('delete', $paper);

        $paper->delete();

        return redirect()
            ->route('papers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
