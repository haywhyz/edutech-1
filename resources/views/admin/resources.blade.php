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
     <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Add Resource</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('addresource')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="file" name="file" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">Subject<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="subject_id"  id="subject_id" class="form-control col-md-7 col-xs-12">
                            @if(count($subjects) > 0)
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Week<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="week_id" type="text" class="form-control" name="week_id" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">Topic<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="topic_id"  id="topic_id" class="form-control col-md-7 col-xs-12">
                            @if(count($topics) > 0)
                            @foreach($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                            @endforeach
                            @endif
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
              <h2>Resources List</h2>
              <div class="clearfix"></div>
            </div>
            @php($no=0)
            @if(count($resources) > 0)
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Week</th>
                    <th>Topic</th>
                    <th>File</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>

                <tbody>
                  <?php  $no=1; ?>
                    @foreach($resources as $resource)
                  <tr>
                  <td>{{$no++}}</td>
                    <td>{{$resource->subject}}</td>
                    <td>{{$resource->week_id}}</td>
                    <td>{{$resource->topic}}</td>
                    <td>{{$resource->file}}</td>
                   <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-resource_id="{{$resource->id}}" data-subject_id="{{$resource->subject_id}}" data-week_id="{{$resource->week_id}}" data-file="{{$resource->file}}" data-topic_id="{{$resource->topic_id}}">
                     Edit
                    </button></td>
                  <td><form class="delete" action="{{ route('deleteresource', $resource->id) }}" method="POST">
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style="display: inline-block">Edit Topic</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('updateresource','resource_id')}}" method="post">
          @csrf

          <div class="form-group">
            <label for="name" class="col-form-label">File:</label>
            <input type="text" class="form-control" id="file" name="file">
          </div>

          <div class="form-group">
            <label for="State" class="col-form-label">Subject</label>
            <select name="subject_id"  id="subject_id" class="form-control col-md-7 col-xs-12">
                            @if(count($subjects) > 0)
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                            @endif
                        </select>
          </div>

  <div class="form-group">
            <label for="State" class="col-form-label">Week</label>
               <select id="week_id" type="text" class="form-control" name="week_id" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
          </div>
 <div class="form-group">
            <label for="State" class="col-form-label">Topic</label>
       <select name="topic_id"  id="topic_id" class="form-control col-md-7 col-xs-12">
                            @if(count($topics) > 0)
                            @foreach($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                            @endforeach
                            @endif
                        </select>
          </div>
          

            <input type="hidden" id="resource_id" name="resource_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Resource </button>
        </div>
        </form>
    </div>
    </div>
  </div>
</div>


<script>
  $('#exampleModal').on('show.bs.modal', function(event){
  var button = $(event.relatedTarget)
  var file = button.data('file')
  var subject_id = button.data('subject_id')
  var week_id = button.data('week_id')
  var topic_id = button.data('topic_id')
  var resource_id = button.data('resource_id')
  var modal = $(this)
  modal.find('.modal-title').text('Edit Resource');
  modal.find('.modal-body #file').val(file);
  modal.find('.modal-body #subject_id').val(subject_id);
  modal.find('.modal-body #week_id').val(week_id);
  modal.find('.modal-body #topic_id').val(topic_id);
  modal.find('.modal-body #resource_id').val(resource_id);
  });

  $(".delete").on("submit", function(){
        return confirm("Do you want to delete this resource?");
    });
  </script>
         @endsection

