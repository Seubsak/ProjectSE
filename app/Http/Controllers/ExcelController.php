<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importExcel(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls',
    ]);

    $file = $request->file('excel_file');

    Excel::import(new StudentImport, $file);

    return redirect()->back()->with('success', 'นำเข้ารายชื่อนักศึกษาสำเร็จ');
}
}
