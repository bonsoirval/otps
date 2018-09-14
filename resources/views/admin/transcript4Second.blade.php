@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b><center>ADMIN Dashboard - Fourth Year Second Semester Result</center></b></div>

                <div class="panel-body">
                  <form method="POST" action="{{route('transcript4SecondSubmit')}}" data-parsley-validate class="form-horizontal form-label-left">

                    <table class="table">

                        <thead>
                          <tr>
                            <th>#</th>
                            <th>COURSE</th>
                            <th>CANDIDATE ID</th>
                            <th>SCORE</th>
                            <th>GRADE</th>
                            <th>REMARK</th>
                          </tr>
                        </thead>
                        <tbody>

                                  <tr>
                                    <th scope="row">1</th>
                                    <td>
                                          <select name="course1"  class="form-control col-md-7 col-xs-12" required>
                                              <option value="">Course</option>
                                              <option value="eng101">Use of English I</option>
                                              <option value="mth101">General Mathematics I</option>
                                              <option value="phy101">General Physics I</option>
                                              <option value="bio101">General Biolog I</option>
                                              <option value="chem101">General Chemistry I</option>
                                          </select>
                                    </td>
                                    <td><input readonly name="alumni_id" value="{{$alumni_id}}" required class="form-control col-md-7 col-xs-12" /></td>
                                    <td><input name="scoreCourse1First"  class="form-control col-md-7 col-xs-12" required/></td>
                                    <td>
                                        <select name="course1Grade"  class="form-control col-md-7 col-xs-12" required>
                                          <option value="">Grade</option>
                                          <option value="a">A</option>
                                          <option value="b">B</option>
                                          <option value="c">C</option>
                                          <option value="d">D</option>
                                          <option value="f">F</option>
                                        </select>
                                    </td>
                                    <td>
                                      <select name="course1Remark"  class="form-control col-md-7 col-xs-12" required>
                                        <option value="">Remark</option>
                                        <option value="pass">PASS</option>
                                        <option value="fail">FAIL</option>
                                      </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>
                                          <select name="course2"  class="form-control col-md-7 col-xs-12" required>
                                              <option value="">Course</option>
                                              <option value="eng101">Use of English I</option>
                                              <option value="mth101">General Mathematics I</option>
                                              <option value="phy101">General Physics I</option>
                                              <option value="bio101">General Biolog I</option>
                                              <option value="chem101">General Chemistry I</option>
                                          </select>
                                    </td>
                                    <td><input readonly name="alumni_id" value="{{$alumni_id}}" required class="form-control col-md-7 col-xs-12" /></td>
                                    <td><input name="course2Score" required class="form-control col-md-7 col-xs-12" /></td>
                                    <td>
                                        <select name="course2Grade"  class="form-control col-md-7 col-xs-12" required>
                                          <option value="">Grade</option>
                                          <option value="a">A</option>
                                          <option value="b">B</option>
                                          <option value="c">C</option>
                                          <option value="d">D</option>
                                          <option value="f">F</option>
                                        </select>
                                    </td>
                                    <td>
                                      <select name="course2Remark"   class="form-control col-md-7 col-xs-12" required>
                                        <option value="">Remark</option>
                                        <option value="pass">PASS</option>
                                        <option value="fail">FAIL</option>
                                      </select>
                                    </td>
                                    <tr>
                                      <th scope="row">3</th>
                                      <td>
                                            <select name="course3"  class="form-control col-md-7 col-xs-12" required>
                                                <option value="">Course</option>
                                                <option value="eng101">Use of English I</option>
                                                <option value="mth101">General Mathematics I</option>
                                                <option value="phy101">General Physics I</option>
                                                <option value="bio101">General Biolog I</option>
                                                <option value="chem101">General Chemistry I</option>
                                            </select>
                                      </td>
                                      <td><input readonly value="{{$alumni_id}}"  class="form-control col-md-7 col-xs-12" required/></td>
                                      <td><input name="course3Score"  class="form-control col-md-7 col-xs-12" required/></td>
                                      <td>
                                          <select name="course3Grade"  class="form-control col-md-7 col-xs-12" required>
                                            <option value="">Grade</option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                            <option value="f">F</option>
                                          </select>
                                      </td>
                                      <td>
                                        <select name="course3Remark"   class="form-control col-md-7 col-xs-12" required>
                                          <option value="">Remark</option>
                                          <option value="pass">PASS</option>
                                          <option value="fail">FAIL</option>
                                        </select>
                                      </td>

                                      <!--td><a href="{{ route('checkCompilation')}}">View Compiled Transcript</a></td-->
                                    </tr><tr>
                                      <th scope="row">4</th>
                                      <td>
                                            <select name="course4" class="form-control col-md-7 col-xs-12"required>
                                                <option value="">Course</option>
                                                <option value="eng101">Use of English I</option>
                                                <option value="mth101">General Mathematics I</option>
                                                <option value="phy101">General Physics I</option>
                                                <option value="bio101">General Biolog I</option>
                                                <option value="chem101">General Chemistry I</option>
                                            </select>
                                      </td>
                                      <td><input readonly value="{{$alumni_id}}"  class="form-control col-md-7 col-xs-12" required/></td>
                                      <td><input name="course4Score"  class="form-control col-md-7 col-xs-12" required/></td>
                                      <td>
                                          <select name="course4Grade"  class="form-control col-md-7 col-xs-12" required>
                                            <option value="">Grade</option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                            <option value="f">F</option>
                                          </select>
                                      </td>
                                      <td>
                                        <select name="course4Remark"   class="form-control col-md-7 col-xs-12" required>
                                          <option value="">Remark</option>
                                          <option value="pass">PASS</option>
                                          <option value="fail">FAIL</option>
                                        </select>
                                      </td>

                                      <!--td><a href="{{ route('checkCompilation')}}">View Compiled Transcript</a></td-->
                                    </tr><tr>
                                      <th scope="row">5</th>
                                      <td>
                                            <select name="course5"  class="form-control col-md-7 col-xs-12" >
                                                <option value="">Course</option>
                                                <option value="eng101">Use of English I</option>
                                                <option value="mth101">General Mathematics I</option>
                                                <option value="phy101">General Physics I</option>
                                                <option value="bio101">General Biolog I</option>
                                                <option value="chem101">General Chemistry I</option>
                                            </select>
                                      </td>
                                      <td><input readonly value="{{$alumni_id}}"  class="form-control col-md-7 col-xs-12" required/></td>
                                      <td><input name="course5Score"  class="form-control col-md-7 col-xs-12" required/></td>
                                      <td>
                                          <select name="course5Grade"  class="form-control col-md-7 col-xs-12" >
                                            <option value="">Grade</option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                            <option value="f">F</option>
                                          </select>
                                      </td>
                                      <td>
                                        <select name="course5Remark"   class="form-control col-md-7 col-xs-12" required>
                                          <option value="">Remark</option>
                                          <option value="pass">PASS</option>
                                          <option value="fail">FAIL</option>
                                        </select>
                                      </td>

                                      <!--td><a href="{{ route('checkCompilation')}}">View Compiled Transcript</a></td-->
                                    </tr>
                                    <!--td><a href="{{ route('checkCompilation')}}">View Compiled Transcript</a></td-->
                                  </tr>

                        </tbody>
                      </table>
                    <div class="ln_solid"></div>
                      <center>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button type="submit" class="btn btn-success">Save and Continue</button>
                          </div>
                        </div>
                      </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
