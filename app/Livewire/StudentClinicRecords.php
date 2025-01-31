<?php

namespace App\Livewire;

use App\Models\ClinicReport;
use Livewire\Component;

class StudentClinicRecords extends Component
{
    public $student;

    public function render()
    {
        return view('livewire.student-clinic-records', [
            'records' => ClinicReport::where('student_id', $this->student)->paginate(10)
        ]);
    }
}
