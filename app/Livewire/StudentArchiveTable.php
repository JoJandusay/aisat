<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentArchiveTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.student-archive-table', [
            'students' => Student::where('is_archived', true)
                ->when($this->search, function ($query) {
                    return $query->where(function ($q) {
                        $q->where('firstname', 'like', '%' . $this->search . '%')
                            ->orWhere('lastname', 'like', '%' . $this->search . '%')
                            ->orWhere('student_code', 'like', '%' . $this->search . '%');
                    });
                })->paginate(10)
        ]);
    }
}
