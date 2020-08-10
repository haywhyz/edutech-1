@extends('admin.layouts.app')

@section('content')   <!-- page content -->
<div class="right_col" role="main">
  @if ($message = Session::get('success'))
  <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ $message }}</strong>
  </div>
  @endif
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Add Subject</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('addsubject')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Subject Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">Teacher in Charge <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="teacher_id"  id="teacher_id" class="form-control col-md-7 col-xs-12">
                            @if(count($teachers) > 0)
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Class<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="class_id" type="text" class="form-control" name="class_id" required>
                                    <option value="JSS1">JSS 1</option>
                                    <option value="JSS2">JSS 2</option>
                                    <option value="JSS3">JSS 3</option>
                                </select>
                    </div>
                  </div>
  
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
  
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Subjects List</h2>
              <div class="clearfix"></div>
            </div>
            @php($no=0)
            @if(count($subjects) > 0)
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Teacher In Charge</th>
                   <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>

                <tbody>
                  <?php  $no=1; ?>
                    @foreach($subjects as $subject)
                  <tr>
                  <td>{{$no++}}</td>
                    <td>{{$subject->name}}</td>
                    <td>{{$subject->teacher}}</td>
                    <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-subject_id="{{$subject->id}}" data-teacher_id="{{$subject->teacher_id}}" data-class_id="{{$subject->class_id}}" data-name="{{$subject->name}}">
                     Edit
                    </button></td>
                  <td><form class="delete" action="{{ route('deletesubject', $subject->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form></td>
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

           <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style="display: inline-block">Edit Subject</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('updatesubject','subject_id')}}" method="post">
          @csrf

          <div class="form-group">
            <label for="name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>

          <div class="form-group">
            <label for="State" class="col-form-label">Teacher in Charge</label>
            <select name="teacher_id"  id="teacher_id" class="form-control col-md-7 col-xs-12">
                            @if(count($teachers) > 0)
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                            @endif
                        </select>
          </div>

  <div class="form-group">
            <label for="State" class="col-form-label">Teacher in Charge</label>
               <select id="class_id" type="text" class="form-control" name="class_id" required>
                                    <option value="JSS1">JSS 1</option>
                                    <option value="JSS2">JSS 2</option>
                                    <option value="JSS3">JSS 3</option>
                                </select>
          </div>

          

            <input type="hidden" id="subject_id" name="subject_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Subject</button>
        </div>
        </form>
    </div>
    </div>
  </div>
</div>


<script>
  $('#exampleModal').on('show.bs.modal', function(event){
  var button = $(event.relatedTarget)
  var name = button.data('name')
  var teacher_id = button.data('teacher_id')
  var class_id = button.data('class_id')
  var subject_id = button.data('subject_id')
  var modal = $(this)
  modal.find('.modal-title').text('Edit Subject');
  modal.find('.modal-body #name').val(name);
  modal.find('.modal-body #teacher_id').val(teacher_id);
  modal.find('.modal-body #class_id').val(class_id);
  modal.find('.modal-body #subject_id').val(subject_id);
  });

  $(".delete").on("submit", function(){
        return confirm("Do you want to delete this subject?");
    });
  </script>
         @endsection
