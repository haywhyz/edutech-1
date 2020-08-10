<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Subject;
use App\Topic;
use App\Resource;
use App\Payment;
use DB;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('student.index')->with('user', $user);
    }


    public function myteachers()
    {
        $teachers =  User::where('role', '=', 'teacher')
        ->where('class', '=', Auth::user()->class)
        ->get();
        return view('student.myteachers')->with('teachers', $teachers);
    }

    public function mysubjects()
    {
        $subjects = Subject::where('class_id', '=', Auth::user()->class)->get();
        return view('student.mysubjects')->with('subjects', $subjects);
    }

    public function showsubject($id){

        $subject = Subject::find($id);
        $topics = Topic::where('subject_id', '=', $id)->get();

        return view('student.showsubject',compact('subject', 'topics'));
    }

    public function showtopic($id){

        $topic = Topic::find($id);
        $resources = Resource::where('topic_id', '=', $id)->get();

        return view('student.showtopic',compact('topic', 'resources'));
    }

    public function mypayments(){

        $payments = Payment::where('student_id', Auth::user()->id)->get();
    
        $payments = DB::table('payments')
        ->join('users', 'users.id', '=', 'payments.student_id')
        ->select('users.name as student', 'payments.*')
        ->where('student_id',  Auth::user()->id)
        ->get();

        return view('student.mypayments')->with(['payments' => $payments]);
    }

}
