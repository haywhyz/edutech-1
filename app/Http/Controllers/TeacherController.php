<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Subject;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('teacher.index')->with('user', $user);
    }


    public function mystudents()
    {
        $students = User::where('role', '=', 'student')
        ->where('class', '=', Auth::user()->class)
        ->get();
        return view('teacher.mystudents')->with('students', $students);
    }

    public function mysubjects()
    {
        $subjects = Subject::where('class_id', '=', Auth::user()->class)->get();
        return view('teacher.mysubjects')->with('subjects', $subjects);
    }

}
