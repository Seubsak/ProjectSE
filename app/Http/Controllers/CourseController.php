<?php

namespace App\Http\Controllers;
use App\Models\course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create(Request $request){
        $course = new course;
        $course->course_code = $request->id;
        $course->course_name = $request->name;
        $course->course_term = $request->term;
        $course->course_desc = $request->info;
        $course->course_year = $request->year;
        $course->id = $request->user_id;
        $course->save();

        return redirect()->route('dashboard');
    }

    public function delete($id){
        $del_course = course::where("course_id",$id);
        $del_course->delete();
        return redirect()->route('dashboard');
    }

    public function editform($id){
        $course = course::where("course_id",$id)->get();
        return redirect()->route('dashboard');
    }

    public function homework($id){
        $course = course::where("course_id",$id)->get();
        return view('homework',compact('course'));
    }

    public function courseDetail($id){
        $course = course::where("course_id",$id)->get();
        $students = Student::all();
        $allCourse = course::all();
        return view('CourseDetail',compact('course','students','allCourse'));
    }

    public function courseEdit(Request $request){
        course::where('course_code', $request->id)->update([
            'course_name' => $request->name,
            'course_desc' => $request->info,
            'course_term' => $request->term,
            'course_year' => $request->year,
        ]);
        return redirect()->route('dashboard');
    }

    public function Addstd(Request $request){
        $std = new Student;
        $std->std = $request->id;
        $std->name = $request->name;
        $std->email = $request->email;
        $std->course_id = $request->course_id;
        $std->save();

        $course = course::where("course_id",$request->course_id)->get();
        $students = Student::all();
        $allCourse = course::all();
        return redirect()->back();

    }

    public function EditStd(Request $request){
        Student::where('std', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->back();
    }

    public function DelStd($id){
        $std = Student::where('id',$id);
        $std->delete();
        return redirect()->back();
    }

    
}
