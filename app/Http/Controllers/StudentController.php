<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('student.index')->with('name', $user->name);
    }

}
