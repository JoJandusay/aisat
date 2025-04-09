<?php

namespace App\Http\Controllers;

use App\Models\ClinicReport;
use App\Models\Student;
use App\Models\User;
use App\Notifications\NewReportNotfication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ClinicReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clinical-reports.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'student_id' => 'required',
            'report_details' => 'required',
            'type' => 'required'
        ]);
        $data['report_date'] =  now();

        $report = ClinicReport::create($data);


        $users = User::all();
        
        foreach ($users as $user) {
            $user->notify(new NewReportNotfication($report));
        }

        return redirect()->route('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.clinic-records', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClinicReport $clinicReport)
    {
        return view('clinical-reports.edit', [
            'record' => $clinicReport
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClinicReport $clinicReport)
    {
        $clinicReport->update([
            'treatment' => $request->treatment
        ]);

        return redirect()->route('clinical-reports.show', $clinicReport->student_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClinicReport $clinicReport)
    {
        //
    }
}