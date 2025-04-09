<?php

namespace App\Exports;

use App\Models\ClinicReport;
use App\Models\Student;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentClinicalReportsExport implements FromCollection, WithMapping, WithHeadings
{
    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Retrieve all clinic reports for this specific student, ordered by report date
        return ClinicReport::where('student_id', $this->student->id)
            ->orderBy('report_date')
            ->get();
    }

    /**
     * Define custom column headers.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Date',
            'Time',
            'Report Details',
            'Treatment',
            'Type',
            'Updated By'
        ];
    }

    /**
     * Map data to custom columns.
     *
     * @param ClinicReport $report
     * @return array
     */
    public function map($report): array
    {
        return [
            Carbon::parse($report->report_date)->format('F d, Y'),
            Carbon::parse($report->report_date)->format('h:i A'),
            $report->report_details,
            $report->treatment ?? 'N/A',
            $report->type,
            $report->user ? $report->user->name : 'N/A'
        ];
    }
}
