<table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Transaction ID</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th>Payment Date</th>
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
                                </tr>
                                <?php $counter += 1; ?>
                            @endforeach
                            <tr><td colspan="5">{{ $myPayment->links() }}</td></tr>
                        @else
                          <p>Hello para</p>
                        @endif

                      </tbody>
                    </table>
