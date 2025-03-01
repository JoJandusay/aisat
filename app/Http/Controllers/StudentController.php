<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create', [
            'levels' => Student::$levels
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_code' => 'required|string|unique:students,student_code',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'address' => 'required|string',
            'dob' => 'required|date|before:today',
            'mobile_number' => 'string',
            'sex' => 'required|in:Male,Female',
            'level' => 'required',
            'section' => 'required',
            'father_lastname' => 'nullable|string|max:255',
            'father_firstname' => 'nullable|string|max:255',
            'father_middlename' => 'nullable|string|max:255',
            'father_mobile_number' => 'nullable',
            'mother_lastname' => 'nullable|string|max:255',
            'mother_firstname' => 'nullable|string|max:255',
            'mother_middlename' => 'nullable|string|max:255',
            'mother_mobile_number' => 'nullable',
            'first_vaccine_name' => 'nullable|string|max:255',
            'second_vaccine_name' => 'nullable|string|max:255',
            'first_vaccine_date' => 'nullable|date|before_or_equal:today',
            'second_vaccine_date' => 'nullable|date|after_or_equal:1st_vaccine_date',
            'booster_name' => 'nullable|string|max:255',
            'booster_date' => 'nullable|date|after_or_equal:2nd_vaccine_date',
            'had_covid' => 'nullable',
            'allergies' => 'nullable|string',
            'medication_name' => 'nullable|string',
            'used_to_treat' => 'nullable|string',
            'dose_time' => 'nullable|string',
            'ongoing_treatment' => 'nullable|string',
            'condition_not_allow_pe' => 'nullable|string',
            'visual_difficulties' => 'nullable|string',
            'hearing_speech_difficulties' => 'nullable|string',
            'medical_conditions' => 'nullable|string',
            'other_medical_conditions' => 'nullable|string',
        ]);

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student information saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($code)
    {
        try {
            // Decrypt the code
            $student_code = Crypt::decrypt($code);

            // Find the student by decrypted code
            $student = Student::where('student_code', $student_code)->firstOrFail();

            // If student is found, show their page
            return view('students.show', ['student' => $student]);
        } catch (\Exception $e) {
            // If the decryption fails or the student is not found, reroute to another route
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student,
            'levels' => Student::$levels
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            // 'student_code' => 'required|string|unique:students,student_code,' . $student->id,
            // 'lastname' => 'required|string|max:255',
            // 'firstname' => 'required|string|max:255',
            // 'middlename' => 'nullable|string|max:255',
            'address' => 'required|string',
            // 'dob' => 'required|date|before:today',
            'mobile_number' => 'string',
            // 'sex' => 'required|in:Male,Female',
            'level' => 'required',
            'section' => 'required',
            // 'father_lastname' => 'nullable|string|max:255',
            // 'father_firstname' => 'nullable|string|max:255',
            // 'father_middlename' => 'nullable|string|max:255',
            'father_mobile_number' => 'nullable',
            // 'mother_lastname' => 'nullable|string|max:255',
            // 'mother_firstname' => 'nullable|string|max:255',
            // 'mother_middlename' => 'nullable|string|max:255',
            'mother_mobile_number' => 'nullable',
            'first_vaccine_name' => 'nullable|string|max:255',
            'second_vaccine_name' => 'nullable|string|max:255',
            'first_vaccine_date' => 'nullable|date|before_or_equal:today',
            'second_vaccine_date' => 'nullable|date|after_or_equal:1st_vaccine_date',
            'booster_name' => 'nullable|string|max:255',
            'booster_date' => 'nullable|date|after_or_equal:2nd_vaccine_date',
            'had_covid' => 'nullable',
            'allergies' => 'nullable|string',
            'medication_name' => 'nullable|string',
            'used_to_treat' => 'nullable|string',
            'dose_time' => 'nullable|string',
            'ongoing_treatment' => 'nullable|string',
            'condition_not_allow_pe' => 'nullable|string',
            'visual_difficulties' => 'nullable|string',
            'hearing_speech_difficulties' => 'nullable|string',
            'medical_conditions' => 'nullable|string',
            'other_medical_conditions' => 'nullable|string',
        ]);

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student information saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Delete successfully.');
    }

    /**
     * Archive the specified resource from storage.
     */
    public function archive(Student $student)
    {
        $student->update([
            'is_archived' => true
        ]);

        return redirect()->route('students.index')->with('success', 'Student moved to archive.');
    }

    public function removeArchive(Student $student)
    {
        $student->update([
            'is_archived' => false
        ]);

        return redirect()->route('archive')->with('success', 'Student removed from archive.');
    }

    public function archiveTable()
    {
        return view('students.archive');
    }

    public function highRisk()
    {
        return view('students.high-risk');
    }
    public function showQR(Student $student)
    {
        // Encrypt the student's code
        $code = Crypt::encrypt($student->student_code);

        // Get the APP_URL from the configuration
        $appUrl = config('app.url');
    
        // Sample IP for production (replace with your actual IP):
        // Example: http://123.45.67.89
        // You can set APP_URL in your .env file to use the actual IP.

        // Generate the full URL with the encrypted code
        $url = $appUrl . "/students/$code";
        
        // Generate the QR code for that URL
        $qrCode = QrCode::size(300)->generate($url);

        // Return the QR code in the view
        return view('students.QR', [
            'student' => $student,
            'qr_code' => $qrCode
        ]);
    }
}
