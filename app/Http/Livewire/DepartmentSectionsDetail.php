<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Section;
use Illuminate\View\View;
use App\Models\Department;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DepartmentSectionsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Department $department;
    public Section $section;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Section';

    protected $rules = [
        'section.name' => ['required', 'max:255', 'string'],
    ];

    public function mount(Department $department): void
    {
        $this->department = $department;
        $this->resetSectionData();
    }

    public function resetSectionData(): void
    {
        $this->section = new Section();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newSection(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.department_sections.new_title');
        $this->resetSectionData();

        $this->showModal();
    }

    public function editSection(Section $section): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.department_sections.edit_title');
        $this->section = $section;

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

        if (!$this->section->department_id) {
            $this->authorize('create', Section::class);

            $this->section->department_id = $this->department->id;
        } else {
            $this->authorize('update', $this->section);
        }

        $this->section->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Section::class);

        Section::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetSectionData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->department->sections as $section) {
            array_push($this->selected, $section->id);
        }
    }

    public function render(): View
    {
        return view('livewire.department-sections-detail', [
            'sections' => $this->department->sections()->paginate(20),
        ]);
    }
}
