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
        'visual_difficulties',
        'hearing_speech_difficulties',
        'medical_conditions',
        'other_medical_conditions',
        'is_archived'
    ];

    public static $levels = [
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        '11',
        '12',
        '1st',
        '2nd',
        '3rd',
        '4th',
        '5th'
    ];
    public function clinicReports()
    {
        return $this->hasMany(ClinicReport::class);
    }

}
