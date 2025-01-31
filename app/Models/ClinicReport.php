<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicReport extends Model
{
    protected $fillable = [
        'student_id',
        'report_details',
        'report_date',
        'type'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
