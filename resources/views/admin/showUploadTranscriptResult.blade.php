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
                                            <th>Year</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                            <!--th>Application Date</th>
                                            <th>Status</th>
                                            <th>Action</th-->
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>1</td>
                                            <td>100</td>
                                            <td>First</td>
                                            <?php $alumni_id = Request::segment(3); ?>
                                            <td><a href="{{url('/admin/transcript1First/'.$alumni_id)}}">Upload Result</a></td>
                                          </tr>
                                          <tr>
                                            <td>2</td>
                                            <td>100</td>
                                            <td>Second</td>
                                            <td><a href="{{url('admin/transcript1Second/'.$alumni_id)}}">Upload Result</a></td>
                                          </tr>
                                          <tr>
                                            <td>3</td>
                                            <td>200</td>
                                            <td>First</td>
                                            <td><a href="{{url('admin/transcript2First/'.$alumni_id)}}">Upload Result</a></td>
                                          </tr>
                                          <tr>
                                            <td>4</td>
                                            <td>200</td>
                                            <td>Second</td>
                                            <td><a href="{{url('admin/transcript2Second/'.$alumni_id)}}">Upload Result</a></td>
                                          </tr>

                                          <tr>
                                            <td>5</td>
                                            <td>300</td>
                                            <td>First</td>
                                            <td><a href="{{url('admin/transcript3First/'.$alumni_id)}}">Upload Result</a></td>
                                          </tr>
                                          <tr>
                                            <td>6</td>
                                            <td>300</td>
                                            <td>Second</td>
                                            <td><a href="{{url('admin/transcript3Second/'.$alumni_id)}}">Upload Result</a></td>
                                          </tr>

                                          <tr>
                                            <td>7</td>
                                            <td>400</td>
                                            <td>First</td>
                                            <td><a href="{{url('admin/transcript4First/'.$alumni_id)}}">Upload Result</a></td>
                                          </tr>
                                          <tr>
                                            <td>8</td>
                                            <td>400</td>
                                            <td>Second</td>
                                            <td><a href="{{url('admin/transcript4Second/'.$alumni_id)}}">Upload Result</a></td>
                                          </tr>

                                        </tbody>
                                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
