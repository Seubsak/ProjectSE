<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class StudentsController extends Controller
{
    public function index(){
        $students = User::all();
        return view('students.index',['students' => $students]);
    }
}
