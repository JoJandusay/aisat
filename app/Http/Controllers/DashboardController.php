<?php

namespace App\Http\Controllers;

use App\Models\ClinicReport;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(ClinicReport::whereMonth('report_date', Carbon::now()->month)->selectRaw('DATE(report_date) as report_date, COUNT(*) as total')->groupByRaw('DATE(report_date)')->get());
        return view('dashboard', [
            'high_risk' => Student::where('is_archived', false)
                ->where(function ($query) {
                    $query->whereNotNull('allergies')
                        ->orWhereNotNull('used_to_treat')
                        ->orWhereNotNull('ongoing_treatment')
                        ->orWhereNotNull('condition_not_allow_pe')
                        ->orWhereNotNull('visual_dificulties')
                        ->orWhereNotNull('hearing_speech_difficulties')
                        ->orWhereNotNull('medical_conditions')
                        ->orWhereNotNull('other_medical_conditions');
                })
                ->count(),
            'students' => Student::where('is_archived', false)->count(),
            'archived' => Student::where('is_archived', true)->count(),
            'reports' => ClinicReport::count(),
            'emergency_students' => ClinicReport::with('student')->whereDate('report_date', now())->where('type', 'emergency')->limit(10)->get(),
            'clinic_students' => ClinicReport::with('student')->whereDate('report_date', now())->where('type', 'clinic')->limit(10)->get(),
            'reports_this_month' => ClinicReport::whereMonth('report_date', Carbon::now()->month)->selectRaw('DATE(report_date) as report_date, COUNT(*) as total')->groupByRaw('DATE(report_date)')->get()
        ]);
    }
}
