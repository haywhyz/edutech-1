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
              <h2>My Payments</h2>
              <div class="clearfix"></div>
            </div>
            @php($no=0)
            @if(count($payments) > 0)
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>

                <tbody>
                  <?php  $no=1; ?>
                    @foreach($payments as $payment)
                  <tr>
                  <td>{{$no++}}</td>
                    <td>{{$payment->student}}</td>
                    <td>{{$payment->amount}}</td>
                    <td class="text-{{($payment->payment_status == 'Approved') ? 'success' : 'danger'}}">,<strong>{{$payment->payment_status}}</strong></td>
                    <td>{{$payment->created_at}}</td>
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
         @endsection
