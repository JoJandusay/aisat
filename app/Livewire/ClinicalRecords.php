<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class ClinicalRecords extends Component
{
    use WithPagination;

    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.clinical-records', [
            'students' => Student::where('is_archived', false)
                ->has('clinicReports', '>', 0)
                ->when($this->search, function ($query) {
                    return $query->where(function ($q) {
                        $q->where('firstname', 'like', '%' . $this->search . '%')
                            ->orWhere('lastname', 'like', '%' . $this->search . '%')
                            ->orWhere('student_code', 'like', '%' . $this->search . '%');
                    });
                })
                ->with('clinicReports')
                ->orderBy('lastname', 'asc')
                ->orderBy('firstname', 'asc')
                ->paginate(10)
        ]);
    }
}
