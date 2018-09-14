@extends('layouts.admin')
@section('content')
<?php use App\Http\Controllers\AdminController;?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">

                  <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Recipient</th>
                          <th>Addrerss</th>
                          <th>Country (id)</th>
                          <th>Application Date</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @if(sizeof($readyForPrints) >= 1)
                        <?php $counter = 1;?>

                            @foreach($readyForPrints as $readyForPrint)
                                <tr>
                                  <th scope="row">{{$counter}}</th>
                                  <td>{{$readyForPrint->recipient}}</td>
                                  <td>{{$readyForPrint->recipient_address}}</td>
                                  <td>{{$readyForPrint->country_id}}</td>
                                  <td>{{$readyForPrint->created_at}}</td>
                                  <td>{{$readyForPrint->status}}</td>
                                  <td>
                                      <?php /*
                                            $checkCompilation = AdminController::checkCompilation($application->alumni_id);
                                            if($checkCompilation == 1)
                                            {
                                                echo "Transcript Processed";
                                                //break;
                                            }else{ */?>
                                                <a href='{{url("admin/printTranscript/".$readyForPrint->alumni_id)}}'>Print Transcript</a>

                                                <?php
                                          //  }

                                      ?>
                                  </td>
                                  <!--td><a href="{{ route('checkCompilation')}}">View Compiled Transcript</a></td-->
                                </tr>
                                <?php $counter += 1; ?>
                            @endforeach
                            <tr><td colspan="5">{{ $readyForPrints->links() }}</td></tr>
                        @else
                        <tr>
                          <th colspan="7"><center>No Pending Applicatin(s) Left</center></th>
                      </tr>
                        @endif

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
