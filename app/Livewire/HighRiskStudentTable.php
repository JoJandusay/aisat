<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class HighRiskStudentTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.high-risk-student-table', [
            'students' => Student::where('is_archived', false)
                ->where(function ($query) {
                    $query->whereNotNull('allergies')
                        ->orWhereNotNull('used_to_treat')
                        ->orWhereNotNull('ongoing_treatment')
                        ->orWhereNotNull('condition_not_allow_pe')
                        ->orWhereNotNull('visual_dificulties')
                        ->orWhereNotNull('hearing_speech_difficulties')
                        ->orWhereNotNull('medical_conditions')
                        ->orWhereNotNull('other_medical_conditions');
                })->when($this->search, function ($query) {
                    return $query->where(function ($q) {
                        $q->where('firstname', 'like', '%' . $this->search . '%')
                            ->orWhere('lastname', 'like', '%' . $this->search . '%')
                            ->orWhere('student_code', 'like', '%' . $this->search . '%');
                    });
                })
                ->orderBy('lastname', 'asc')
                ->orderBy('firstname', 'asc')
                ->paginate(10)
        ]);
    }
}
