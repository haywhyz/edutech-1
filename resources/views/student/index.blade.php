@extends('student.layouts.app')

@section('content')   <!-- page content -->
<div class="right_col" role="main">
  @if ($message = Session::get('success'))
  <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ $message }}</strong>
  </div>
  @endif
    <!-- top tiles -->
    <div class="page-title">
        <div class="title_left">
          <h3>Student Profile</h3>
        </div>
      </div>
      <div class="clearfix"></div>
    <div class="row tile_count">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Student Name:</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->name}}" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Student Phone:</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->email}}" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pin">Student Class:</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="class" name="class" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->class}}" readonly>
              </div>
            </div>
            </div>
          </form> 
    </div>
  </div>


  @endsection