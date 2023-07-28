<?php

namespace App\Http\Controllers\Api;

use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaperResource;
use App\Http\Resources\PaperCollection;
use App\Http\Requests\PaperStoreRequest;
use App\Http\Requests\PaperUpdateRequest;

class PaperController extends Controller
{
    public function index(Request $request): PaperCollection
    {
        $this->authorize('view-any', Paper::class);

        $search = $request->get('search', '');

        $papers = Paper::search($search)
            ->latest()
            ->paginate();

        return new PaperCollection($papers);
    }

    public function store(PaperStoreRequest $request): PaperResource
    {
        $this->authorize('create', Paper::class);

        $validated = $request->validated();

        $paper = Paper::create($validated);

        return new PaperResource($paper);
    }

    public function show(Request $request, Paper $paper): PaperResource
    {
        $this->authorize('view', $paper);

        return new PaperResource($paper);
    }

    public function update(
        PaperUpdateRequest $request,
        Paper $paper
    ): PaperResource {
        $this->authorize('update', $paper);

        $validated = $request->validated();

        $paper->update($validated);

        return new PaperResource($paper);
    }

    public function destroy(Request $request, Paper $paper): Response
    {
        $this->authorize('delete', $paper);

        $paper->delete();

        return response()->noContent();
    }
}
