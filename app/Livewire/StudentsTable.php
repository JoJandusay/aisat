<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsTable extends Component
{
    use WithPagination;

    public $sections;
    public $levels;
    public $selected_section = '';
    public $selected_level = '';
    public $search = ''; // Add a search property

    public function mount()
    {
        $this->levels = Student::$levels;
        $this->sections = Student::pluck('section')->unique();
    }

    public function updatedSelectedSection()
    {
        $this->resetPage();
    }

    public function updatedSelectedLevel()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $students = Student::where('is_archived', false)
            ->when($this->selected_section, function ($query) {
                return $query->where('section', $this->selected_section);
            })
            ->when($this->selected_level, function ($query) {
                return $query->where('level', $this->selected_level);
            })
            ->when($this->search, function ($query) {
                return $query->where(function ($q) {
                    $q->where('firstname', 'like', '%' . $this->search . '%')
                        ->orWhere('lastname', 'like', '%' . $this->search . '%')
                        ->orWhere('student_code', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('lastname', 'asc')
            ->orderBy('firstname', 'asc')
            ->paginate(10);

        return view('livewire.students-table', [
            'students' => $students,
        ]);
    }
}
