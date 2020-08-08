<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Subject;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('student.index')->with('user', $user);
    }


    public function myteachers()
    {
        $teachers = User::where('role', '=', 'teacher')
        ->where('class', '=', Auth::user()->class)
        ->get();
        return view('student.myteachers')->with('teachers', $teachers);
    }

    public function mysubjects()
    {
        $subjects = Subject::where('class_id', '=', Auth::user()->class)->get();
        return view('student.mysubjects')->with('subjects', $subjects);
    }

}
