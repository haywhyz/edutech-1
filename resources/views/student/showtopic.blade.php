@extends('student.layouts.app')

@section('content')   <!-- page content -->
<div class="right_col" role="main">
  @if ($message = Session::get('success'))
  <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ $message }}</strong>
  </div>
  @endif
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
          <h2>Resources for {{$topic->name}}</h2>
            <div class="clearfix"></div>
          </div>
          @if(count($resources) > 0)
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Week</th>
                  <th>Resource</th>
                </tr>
              </thead>

              <tbody>
                  @foreach($resources as $resource)
                <tr>
                <td>{{$resource->week_id}}</td>
                  <td>{{$resource->file}}</td>
                </tr>
                @endforeach
              </tbody>

            </table>
          </div>
          @else

          <div class="alert alert-danger">No record found</div>

          @endif
        </div>
      </div>
    </div>
        </div>
  <!-- /page content -->

  @endsection