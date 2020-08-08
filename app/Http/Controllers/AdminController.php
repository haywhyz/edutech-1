<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Payment;
use App\Subject;
use App\Topic;
use App\Resource;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin = Admin::where('id', Auth::user()->id)->first();
        return view('admin.index')->with('name', $admin->name);
    }

      public function payments()
    {
        $payments = DB::table('payments')
        ->join('users', 'users.id', '=', 'payments.student_id')
        ->join('subjects', 'subjects.id', '=', 'payments.subject_id')
        ->select('users.name as student', 'subjects.name as subject', 'payments.*')
        ->get();

      return view('admin.payments')->with(['payments' => $payments]);
    }

    public function subjects()
    {
      $subjects = DB::table('subjects')
      ->join('users', 'users.id', '=', 'subjects.teacher_id')
      ->select('users.name as teacher', 'subjects.*')
      ->get();
        return view('admin.subjects')->with(['subjects' => $subjects]);
    }

    public function topics()
    {

      $topics = DB::table('topics')
      ->join('subjects', 'subjects.id', '=', 'topics.subject_id')
      ->select('subjects.name as subject', 'topics.*')
      ->get();
        return view('admin.topics')->with(['topics' => $topics]);
    }
    
    public function resources()
    {
        $resources = DB::table('resources')
        ->join('subjects', 'subjects.id', '=', 'resources.subject_id')
        ->join('topics', 'topics.id', '=', 'resources.topic_id')
        ->select('subjects.name as subject', 'topics.name as topic', 'resources.*')
        ->get();
      return view('admin.resources')->with(['resources' => $resources]);
    }

 

}
