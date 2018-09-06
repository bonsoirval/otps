@extends('layouts.alumni')
@section('content')
<?php use App\Http\Controllers\AlumniController;?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  My Transcript Applications
                  @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
                </div>

                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Recipient</th>
                        <th>Recipient Address</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $count = 1; ?>
                      @if(sizeof($applications) >=1 )
                        @foreach($applications as $application)
                        <tr>
                          <td>{{$count}}</td>
                          <td>{{$application->recipient}}</td>
                          <td>{{$application->recipient_address}}</td>
                          <td>{{$application->status}}</td>
                          <td>{{AlumniController::download($application->country_id, $application->status)}}</td>
                        </tr>
                        <?php $count += 1; ?>
                        @endforeach
                      @else
                      <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>{{ $transcript->download }}</td>
                      </tr>
                      @endif
                      <tr><td colspan="5">{{ $applications->links() }}</td></tr>
                    </tbody>
                    {{ $applications->links() }}
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
