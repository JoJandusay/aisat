<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_code',
        'lastname',
        'firstname',
        'middlename',
        'address',
        'dob',
        'mobile_number',
        'level',
        'section',
        'sex',
        'father_lastname',
        'father_firstname',
        'father_middlename',
        'father_mobile_number',
        'mother_lastname',
        'mother_firstname',
        'mother_middlename',
        'mother_mobile_number',
        'first_vaccine_name',
        'second_vaccine_name',
        'first_vaccine_date',
        'second_vaccine_date',
        'booster_name',
        'booster_date',
        'had_covid',
        'allergies',
        'medication_name',
        'used_to_treat',
        'dose_time',
        'ongoing_treatment',
        'condition_not_allow_pe',
        'visual_dificulties',
        'hearing_speech_difficulties',
        'medical_conditions',
        'other_medical_conditions',
        'is_archived'
    ];

    public static $levels = [
        'GRADE 11',
        'GRADE 12',
        '1ST YEAR COLLEGE',
        '2nd YEAR COLLEGE',
        '3RD YEAR COLLEGE',
        '4TH YEAR COLLEGE',
        '5TH YEAR COLLEGE',
    ];
    public function clinicReports()
    {
        return $this->hasMany(ClinicReport::class);
    }
}
