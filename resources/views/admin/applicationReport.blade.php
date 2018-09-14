@extends('layouts.admin')
@section('content')
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

                                          @if(sizeof($applications) >= 1)
                                          <?php $counter = 1;?>
                                              @foreach($applications as $application)
                                                  <tr>
                                                    <th scope="row">{{$counter}}</th>
                                                    <td>{{$application->recipient}}</td>
                                                    <td>{{$application->recipient_address}}</td>
                                                    <td>{{$application->country_id}}</td>
                                                    <td>{{$application->created_at}}</td>
                                                    <td>{{$application->status}}</td>
                                                    <td>Next Action</td>
                                                  </tr>
                                                  <?php $counter += 1; ?>
                                              @endforeach
                                              <tr><td colspan="5">{{ $applications->links() }}</td></tr>
                                          @else
                                            <p>No Data Found</p>
                                          @endif

                                        </tbody>
                                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
