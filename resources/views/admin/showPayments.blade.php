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
                                            <th>Transaction ID</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Payment Date</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                          @if(sizeof($myPayment) >= 1)
                                          <?php $counter = 1;?>
                                              @foreach($myPayment as $payment)
                                                  <tr>
                                                    <th scope="row">{{$counter}}</th>
                                                    <td>{{$payment->txtref}}</td>
                                                    <td>{{$payment->amount}}</td>
                                                    <td>{{$payment->status}}</td>
                                                    <td>{{$payment->created_at}}</td>
                                                    <td>Next Action</td>
                                                  </tr>
                                                  <?php $counter += 1; ?>
                                              @endforeach
                                              <tr><td colspan="5">{{ $myPayment->links() }}</td></tr>
                                          @else
                                          
                                          @endif

                                        </tbody>
                                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
