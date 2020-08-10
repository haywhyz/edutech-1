<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Payment;
use App\Subject;
use App\Topic;
use App\User;
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

    public function students()
    {
        $students = User::where('role', '=', 'student')
        ->get();
        return view('admin.students')->with('students', $students);
    }

    public function teachers()
    {
        $teachers =  User::where('role', '=', 'teacher')
        ->get();
        return view('admin.teachers')->with('teachers', $teachers);
    }


    public function subjects()
    {
      $teachers =  User::where('role', '=', 'teacher')->get();
      $subjects = DB::table('subjects')
      ->join('users', 'users.id', '=', 'subjects.teacher_id')
      ->select('users.name as teacher', 'subjects.*')
      ->get();
        return view('admin.subjects')->with(['subjects' => $subjects, 'teachers' => $teachers]);
    }

    public function createsubject(Request $request) {

      $this->validate($request, [
  'name' => 'required|min:3',
  'teacher_id' => 'required',
  'class_id' => 'required',
                              ]);
      Subject::create([
          'name' =>$name=$request->get('name'),
          'teacher_id' =>$teacher_id=$request->get('teacher_id'),
          'class_id' =>$class_id=$request->get('class_id'),
      ]);

      return redirect()->back()->with('success','Subject Added Successfully');
  }

  public function updatesubject(Request $request)
  {
      $subject = array(
          'name' => $request->name,
          'teacher_id' => $request->teacher_id,
          'class_id' => $request->class_id,
  );


  Subject::findOrfail($request->subject_id)->update($subject);

  return redirect()->back()->with('success','Subject Updated Successfully');
  }


  public function deletesubject($id) {
    $subject = Subject::find($id);
    $subject->delete();
    return redirect()->back()->with('success','Subject deleted Successfully');
}

    public function topics()
    {
      $subjects = Subject::get();
      $topics = DB::table('topics')
      ->join('subjects', 'subjects.id', '=', 'topics.subject_id')
      ->select('subjects.name as subject', 'topics.*')
      ->get();
        return view('admin.topics')->with(['topics' => $topics, 'subjects' => $subjects]);
    }
    
    public function createtopic(Request $request) {

      $this->validate($request, [
  'name' => 'required|min:3',
  'subject_id' => 'required',
  'week_id' => 'required',
                              ]);
     Topic::create([
          'name' =>$name=$request->get('name'),
          'subject_id' =>$subject_id=$request->get('subject_id'),
          'week_id' =>$week_id=$request->get('week_id'),
      ]);

      return redirect()->back()->with('success','Topic Added Successfully');
  }

  public function updatetopic(Request $request)
  {
      $topic = array(
          'name' => $request->name,
          'subject_id' => $request->subject_id,
          'week_id' => $request->week_id,
  );


  Topic::findOrfail($request->topic_id)->update($topic);

  return redirect()->back()->with('success','Topic Updated Successfully');
  }


  public function deletetopic($id) {
    $topic = Topic::find($id);
    $topic->delete();
    return redirect()->back()->with('success','Topic deleted Successfully');
}


    public function resources()
    {   
        $subjects = Subject::get();
        $topics = Topic::get();
        $resources = DB::table('resources')
        ->join('subjects', 'subjects.id', '=', 'resources.subject_id')
        ->join('topics', 'topics.id', '=', 'resources.topic_id')
        ->select('subjects.name as subject', 'topics.name as topic', 'resources.*')
        ->get();
      return view('admin.resources')->with(['resources' => $resources, 'topics' => $topics, 'subjects' => $subjects]);
    }

 
    public function createresource(Request $request) {

      $this->validate($request, [
  'file' => 'required|min:3',
  'subject_id' => 'required',
  'week_id' => 'required',
  'topic_id' => 'required',
                              ]);
     Resource::create([
          'file' =>$file=$request->get('file'),
          'subject_id' =>$subject_id=$request->get('subject_id'),
          'week_id' =>$week_id=$request->get('week_id'),
          'topic_id' =>$topic_id=$request->get('topic_id'),
      ]);

      return redirect()->back()->with('success','Resource Added Successfully');
  }

  public function updateresource(Request $request)
  {
      $resource = array(
          'file' => $request->file,
          'subject_id' => $request->subject_id,
          'week_id' => $request->week_id,
          'topic_id' => $request->topic_id,
  );


  Resource::findOrfail($request->resource_id)->update($resource);

  return redirect()->back()->with('success','Resource Updated Successfully');
  }


  public function deleteresource($id) {
    $resource = Resource::find($id);
    $resource->delete();
    return redirect()->back()->with('success','Resource deleted Successfully');
}
}
