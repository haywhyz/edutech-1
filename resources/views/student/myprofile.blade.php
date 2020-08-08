@extends('student.layouts.app')

@section('content')   <!-- page content -->
   <div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
     
    Student Profile
    {{$profile->name}}
    {{ Auth()->user()->name }}
    </div>
  </div>
  <!-- /page content -->

  @endsection