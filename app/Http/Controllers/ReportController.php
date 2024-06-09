<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class ReportController extends Controller
{
    public function showGenerateReportForm()
    {
        // Get all unique institutes from the registrations
        $institutes = Registration::select('R_EduInstitute')->distinct()->pluck('R_EduInstitute');
        return view('registration.Staff.generate_report_page', compact('institutes'));
    }

    public function generateReport(Request $request)
    {
        $institute = $request->input('institute');

        // Count the number of registrations for the selected institute
        $count = Registration::where('R_EduInstitute', $institute)->count();

        $report = [
            'institute' => $institute,
            'count' => $count
        ];

        // Get all unique institutes again for the form
        $institutes = Registration::select('R_EduInstitute')->distinct()->pluck('R_EduInstitute');

        return view('registration.Staff.generate_report_page', compact('institutes', 'report'));
    }
  
}
