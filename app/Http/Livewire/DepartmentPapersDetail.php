<?php

namespace App\Http\Livewire;

use App\Models\Paper;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DepartmentPapersDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Department $department;
    public Paper $paper;
    public $paperPublishedAt;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Paper';

    protected $rules = [
        'paper.title' => ['required', 'max:255', 'string'],
        'paper.publisher' => ['required', 'max:255', 'string'],
        'paperPublishedAt' => ['required', 'date'],
    ];

    public function mount(Department $department): void
    {
        $this->department = $department;
        $this->resetPaperData();
    }

    public function resetPaperData(): void
    {
        $this->paper = new Paper();

        $this->paperPublishedAt = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newPaper(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.department_papers.new_title');
        $this->resetPaperData();

        $this->showModal();
    }

    public function editPaper(Paper $paper): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.department_papers.edit_title');
        $this->paper = $paper;

        $this->paperPublishedAt = optional($this->paper->published_at)->format(
            'Y-m-d'
        );

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal(): void
    {
        $this->showingModal = false;
    }

    public function save(): void
    {
        $this->validate();

        if (!$this->paper->department_id) {
            $this->authorize('create', Paper::class);

            $this->paper->department_id = $this->department->id;
        } else {
            $this->authorize('update', $this->paper);
        }

        $this->paper->published_at = \Carbon\Carbon::make(
            $this->paperPublishedAt
        );

        $this->paper->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Paper::class);

        Paper::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetPaperData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->department->papers as $paper) {
            array_push($this->selected, $paper->id);
        }
    }

    public function render(): View
    {
        return view('livewire.department-papers-detail', [
            'papers' => $this->department->papers()->paginate(20),
        ]);
    }
}
