<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Http\Request;
use PDF;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        /*$myPayment = DB::table('payments')->select("*")->orderBy('id', 'desc')->paginate(5); //->get();
        //$myPayment = json_decode(json_encode($myPayment)); //it will return you stdclass object
        //$myPayment = json_decode(json_encode($myPayment),true); //it will return you data in array
        dd($myPayment)
        return view('admin.showPayments', compact('myPayment'));*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    public function paymentReport()
    {
        $payments = DB::table('payments')->select("*")->orderBy('id', 'desc')->paginate(5); //->get();
        //$applications = json_decode(json_encode($applications)); //it will return you stdclass object
        //$applications = json_decode(json_encode($applications),true); //it will return you data in array

        //$myPayment = json_decode(json_encode($myPayment)); //it will return you stdclass object
        //$myPayment = json_decode(json_encode($myPayment),true); //it will return you data in array
        //dd($myPayment);
        return view('admin.paymentReport', compact('payments'));
    }

    public function applicationReport()
    {
        $applications = DB::table('transcript_applications')->select("*")->orderBy('id', 'desc')->paginate(5); //->get();
        //$applications = json_decode(json_encode($applications)); //it will return you stdclass object
        //$applications = json_decode(json_encode($applications),true); //it will return you data in array

        //$myPayment = json_decode(json_encode($myPayment)); //it will return you stdclass object
        //$myPayment = json_decode(json_encode($myPayment),true); //it will return you data in array
        //dd($myPayment);
        return view('admin.applicationReport', compact('applications'));
    }

    public function printTranscript()
    {
      $data = [
      'foo' => 'bar'
      ];
      $pdf = PDF::loadView('transcript.transcript', $data);

      //update transcript status to sent out
      return $pdf->download('document.pdf');
    }


    public function showReadyForPrint()
    {
        $readyForPrints = DB::table('transcript_applications')
        ->where('status', 'completed')
        ->select("*")
        ->orderBy('id', 'desc')->paginate(5); //->get();
        return view('admin.showReadyForPrint', compact('readyForPrints'));
    }

    public function showPrintedTranscrips()
    {
      echo "printedTranscrips";
    }
    public static function checkCompilation($alumni_id){

      $applications = DB::table('transcript')->select("*")->where('alumni_id', $alumni_id)->paginate(5); //->get();

      if(sizeof($applications) >=1)
      {return 1;}
      return 0; //echo "<a href='{{route(\'uploadTranscriptResult\')}}'>Upload Transcript Result </a> ";
    }

    public function transcript1First()
    {
      //get alumni_id
      $alumni_id = request()->segment(3);
      //$alumni_id = request()->segment(3);
      return view('admin.transcript1First', compact('alumni_id'));
    }
    public function transcript1FirstSubmit(Request $request)
    {
        //dd($request);

        $course1 = $request->course1;
        $alumni_id = $request->alumni_id;
        $scoreCourse1First = $request->scoreCourse1First;
        $course1Grade = $request->course1Grade;
        $course1Remark = $request->course1Remark;
        $course1 = DB::table('year_one')
        ->insert(
          [
          'semester' => 'first',
          'alumni_id' => $alumni_id,
          'course' => $course1,
          'score' => $scoreCourse1First,
          'grade' => $course1Grade,
          'remark' => $course1Remark
        ]); //->get();


        //second course
        $course2 = $request->course2;
        $course2Score = $request->course2Score;
        $course2Grade = $request->course2Grade;
        $course2Remark = $request->course2Remark;

        $course2 = DB::table('year_one')
        ->insert(
          [
          'semester' => 'first',
          'alumni_id' => $alumni_id,
          'course' => $course2,
          'score' => $course2Score,
          'grade' => $course2Grade,
          'remark' => $course2Remark
        ]);

        //third course
        $course3 = $request->course3;
        $course3Score = $request->course3Score;
        $course3Grade = $request->course3Grade;
        $course3Remark = $request->course3Remark;
        $course3 = DB::table('year_one')
        ->insert(
          [
          'semester' => 'first',
          'alumni_id' => $alumni_id,
          'course' => $course3,
          'score' => $course3Score,
          'grade' => $course3Grade,
          'remark' => $course3Remark
        ]);

        //fourth course
        $course4 = $request->course4;
        $course4Score = $request->course4Score;
        $course4Grade = $request->course4Grade;
        $course4Remark = $request->course4Remark;

        $course4 = DB::table('year_one')
        ->insert(
          [
          'semester' => 'first',
          'alumni_id' => $alumni_id,
          'course' => $course4,
          'score' => $course4Score,
          'grade' => $course4Grade,
          'remark' => $course4Remark
        ]);

        //fifth course
        $course5 = $request->course5;
        $course5Score = $request->course5Score;
        $course5Grade = $request->course5Grade;
        $course5Remark = $request->course5Remark;

        $course5 = DB::table('year_one')
        ->insert(
          [
          'semester' => 'first',
          'alumni_id' => $alumni_id,
          'course' => $course5,
          'score' => $course5Score,
          'grade' => $course5Grade,
          'remark' => $course5Remark
        ]);

      return redirect(url('admin/transcript1Second/'.$alumni_id));
    }

    public function transcript1Second()
    {
      //get alumni_id
      $alumni_id = request()->segment(3);
      //$alumni_id = request()->segment(3);
      return view('admin.transcript1Second', compact('alumni_id'));
    }
    public function transcript1SecondSubmit(Request $request)
    {
          //dd($request);

          $course1 = $request->course1;
          $alumni_id = $request->alumni_id;
          $scoreCourse1First = $request->scoreCourse1First;
          $course1Grade = $request->course1Grade;
          $course1Remark = $request->course1Remark;
          $course1 = DB::table('year_one')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course1,
            'score' => $scoreCourse1First,
            'grade' => $course1Grade,
            'remark' => $course1Remark
          ]); //->get();


          //second course
          $course2 = $request->course2;
          $course2Score = $request->course2Score;
          $course2Grade = $request->course2Grade;
          $course2Remark = $request->course2Remark;

          $course2 = DB::table('year_one')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course2,
            'score' => $course2Score,
            'grade' => $course2Grade,
            'remark' => $course2Remark
          ]);

          //third course
          $course3 = $request->course3;
          $course3Score = $request->course3Score;
          $course3Grade = $request->course3Grade;
          $course3Remark = $request->course3Remark;
          $course3 = DB::table('year_one')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course3,
            'score' => $course3Score,
            'grade' => $course3Grade,
            'remark' => $course3Remark
          ]);

          //fourth course
          $course4 = $request->course4;
          $course4Score = $request->course4Score;
          $course4Grade = $request->course4Grade;
          $course4Remark = $request->course4Remark;

          $course4 = DB::table('year_one')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course4,
            'score' => $course4Score,
            'grade' => $course4Grade,
            'remark' => $course4Remark
          ]);

          //fifth course
          $course5 = $request->course5;
          $course5Score = $request->course5Score;
          $course5Grade = $request->course5Grade;
          $course5Remark = $request->course5Remark;

          $course5 = DB::table('year_one')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course5,
            'score' => $course5Score,
            'grade' => $course5Grade,
            'remark' => $course5Remark
          ]);

        return redirect(url('admin/transcript2First/'.$alumni_id));
    }

    public function transcript2First()
    {
      //get alumni_id
      $alumni_id = request()->segment(3);
      return view('admin.transcript2First', compact('alumni_id'));
    }
    public function transcript2FirstSubmit(Request $request)
    {
          //dd($request);

          $course1 = $request->course1;
          $alumni_id = $request->alumni_id;
          $scoreCourse1First = $request->scoreCourse1First;
          $course1Grade = $request->course1Grade;
          $course1Remark = $request->course1Remark;
          $course1 = DB::table('year_two')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course1,
            'score' => $scoreCourse1First,
            'grade' => $course1Grade,
            'remark' => $course1Remark
          ]); //->get();


          //second course
          $course2 = $request->course2;
          $course2Score = $request->course2Score;
          $course2Grade = $request->course2Grade;
          $course2Remark = $request->course2Remark;

          $course2 = DB::table('year_two')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course2,
            'score' => $course2Score,
            'grade' => $course2Grade,
            'remark' => $course2Remark
          ]);

          //third course
          $course3 = $request->course3;
          $course3Score = $request->course3Score;
          $course3Grade = $request->course3Grade;
          $course3Remark = $request->course3Remark;
          $course3 = DB::table('year_two')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course3,
            'score' => $course3Score,
            'grade' => $course3Grade,
            'remark' => $course3Remark
          ]);

          //fourth course
          $course4 = $request->course4;
          $course4Score = $request->course4Score;
          $course4Grade = $request->course4Grade;
          $course4Remark = $request->course4Remark;

          $course4 = DB::table('year_two')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course4,
            'score' => $course4Score,
            'grade' => $course4Grade,
            'remark' => $course4Remark
          ]);

          //fifth course
          $course5 = $request->course5;
          $course5Score = $request->course5Score;
          $course5Grade = $request->course5Grade;
          $course5Remark = $request->course5Remark;

          $course5 = DB::table('year_two')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course5,
            'score' => $course5Score,
            'grade' => $course5Grade,
            'remark' => $course5Remark
          ]);

        return redirect(url('admin/transcript2Second/'.$alumni_id));
    }


    public function transcript2Second()
    {
        //get alumni_id
        $alumni_id = request()->segment(3);
        return view('admin.transcript2Second', compact('alumni_id'));
    }
    public function transcript2SecondSubmit(Request $request)
    {
          //dd($request);

          $course1 = $request->course1;
          $alumni_id = $request->alumni_id;
          $scoreCourse1First = $request->scoreCourse1First;
          $course1Grade = $request->course1Grade;
          $course1Remark = $request->course1Remark;
          $course1 = DB::table('year_two')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course1,
            'score' => $scoreCourse1First,
            'grade' => $course1Grade,
            'remark' => $course1Remark
          ]); //->get();


          //second course
          $course2 = $request->course2;
          $course2Score = $request->course2Score;
          $course2Grade = $request->course2Grade;
          $course2Remark = $request->course2Remark;

          $course2 = DB::table('year_two')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course2,
            'score' => $course2Score,
            'grade' => $course2Grade,
            'remark' => $course2Remark
          ]);

          //third course
          $course3 = $request->course3;
          $course3Score = $request->course3Score;
          $course3Grade = $request->course3Grade;
          $course3Remark = $request->course3Remark;
          $course3 = DB::table('year_two')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course3,
            'score' => $course3Score,
            'grade' => $course3Grade,
            'remark' => $course3Remark
          ]);

          //fourth course
          $course4 = $request->course4;
          $course4Score = $request->course4Score;
          $course4Grade = $request->course4Grade;
          $course4Remark = $request->course4Remark;

          $course4 = DB::table('year_two')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course4,
            'score' => $course4Score,
            'grade' => $course4Grade,
            'remark' => $course4Remark
          ]);

          //fifth course
          $course5 = $request->course5;
          $course5Score = $request->course5Score;
          $course5Grade = $request->course5Grade;
          $course5Remark = $request->course5Remark;

          $course5 = DB::table('year_two')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course5,
            'score' => $course5Score,
            'grade' => $course5Grade,
            'remark' => $course5Remark
          ]);

        return redirect(url('admin/transcript3First/'.$alumni_id));
    }

    public function transcript3First(Request $request)
    {
        //get alumni_id
        $alumni_id = request()->segment(3);
        return view('admin.transcript3First', compact('alumni_id'));
    }
    public function transcript3FirstSubmit(Request $request)
    {
          //dd($request);

          $course1 = $request->course1;
          $alumni_id = $request->alumni_id;
          $scoreCourse1First = $request->scoreCourse1First;
          $course1Grade = $request->course1Grade;
          $course1Remark = $request->course1Remark;
          $course1 = DB::table('year_three')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course1,
            'score' => $scoreCourse1First,
            'grade' => $course1Grade,
            'remark' => $course1Remark
          ]); //->get();


          //second course
          $course2 = $request->course2;
          $course2Score = $request->course2Score;
          $course2Grade = $request->course2Grade;
          $course2Remark = $request->course2Remark;

          $course2 = DB::table('year_three')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course2,
            'score' => $course2Score,
            'grade' => $course2Grade,
            'remark' => $course2Remark
          ]);

          //third course
          $course3 = $request->course3;
          $course3Score = $request->course3Score;
          $course3Grade = $request->course3Grade;
          $course3Remark = $request->course3Remark;
          $course3 = DB::table('year_three')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course3,
            'score' => $course3Score,
            'grade' => $course3Grade,
            'remark' => $course3Remark
          ]);

          //fourth course
          $course4 = $request->course4;
          $course4Score = $request->course4Score;
          $course4Grade = $request->course4Grade;
          $course4Remark = $request->course4Remark;

          $course4 = DB::table('year_three')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course4,
            'score' => $course4Score,
            'grade' => $course4Grade,
            'remark' => $course4Remark
          ]);

          //fifth course
          $course5 = $request->course5;
          $course5Score = $request->course5Score;
          $course5Grade = $request->course5Grade;
          $course5Remark = $request->course5Remark;

          $course5 = DB::table('year_three')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course5,
            'score' => $course5Score,
            'grade' => $course5Grade,
            'remark' => $course5Remark
          ]);

        return redirect(url('admin/transcript3Second/'.$alumni_id));
    }

    public function transcript3Second(Request $request)
    {
        //get alumni_id
        $alumni_id = request()->segment(3);
        return view('admin.transcript3Second', compact('alumni_id'));
    }
    public function transcript3SecondSubmit(Request $request)
    {
          //dd($request);

          $course1 = $request->course1;
          $alumni_id = $request->alumni_id;
          $scoreCourse1First = $request->scoreCourse1First;
          $course1Grade = $request->course1Grade;
          $course1Remark = $request->course1Remark;
          $course1 = DB::table('year_three')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course1,
            'score' => $scoreCourse1First,
            'grade' => $course1Grade,
            'remark' => $course1Remark
          ]); //->get();


          //second course
          $course2 = $request->course2;
          $course2Score = $request->course2Score;
          $course2Grade = $request->course2Grade;
          $course2Remark = $request->course2Remark;

          $course2 = DB::table('year_three')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course2,
            'score' => $course2Score,
            'grade' => $course2Grade,
            'remark' => $course2Remark
          ]);

          //third course
          $course3 = $request->course3;
          $course3Score = $request->course3Score;
          $course3Grade = $request->course3Grade;
          $course3Remark = $request->course3Remark;
          $course3 = DB::table('year_three')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course3,
            'score' => $course3Score,
            'grade' => $course3Grade,
            'remark' => $course3Remark
          ]);

          //fourth course
          $course4 = $request->course4;
          $course4Score = $request->course4Score;
          $course4Grade = $request->course4Grade;
          $course4Remark = $request->course4Remark;

          $course4 = DB::table('year_three')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course4,
            'score' => $course4Score,
            'grade' => $course4Grade,
            'remark' => $course4Remark
          ]);

          //fifth course
          $course5 = $request->course5;
          $course5Score = $request->course5Score;
          $course5Grade = $request->course5Grade;
          $course5Remark = $request->course5Remark;

          $course5 = DB::table('year_three')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course5,
            'score' => $course5Score,
            'grade' => $course5Grade,
            'remark' => $course5Remark
          ]);

        return redirect(url('admin/transcript4First/'.$alumni_id));
    }

    public function transcript4First()
    {
        //get alumni_id
        $alumni_id = request()->segment(3);
        return view('admin.transcript4First', compact('alumni_id'));
    }
    public function transcript4FirstSubmit(Request $request)
    {
          //dd($request);

          $course1 = $request->course1;
          $alumni_id = $request->alumni_id;
          $scoreCourse1First = $request->scoreCourse1First;
          $course1Grade = $request->course1Grade;
          $course1Remark = $request->course1Remark;
          $course1 = DB::table('year_four')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course1,
            'score' => $scoreCourse1First,
            'grade' => $course1Grade,
            'remark' => $course1Remark
          ]); //->get();


          //second course
          $course2 = $request->course2;
          $course2Score = $request->course2Score;
          $course2Grade = $request->course2Grade;
          $course2Remark = $request->course2Remark;

          $course2 = DB::table('year_four')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course2,
            'score' => $course2Score,
            'grade' => $course2Grade,
            'remark' => $course2Remark
          ]);

          //third course
          $course3 = $request->course3;
          $course3Score = $request->course3Score;
          $course3Grade = $request->course3Grade;
          $course3Remark = $request->course3Remark;
          $course3 = DB::table('year_four')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course3,
            'score' => $course3Score,
            'grade' => $course3Grade,
            'remark' => $course3Remark
          ]);

          //fourth course
          $course4 = $request->course4;
          $course4Score = $request->course4Score;
          $course4Grade = $request->course4Grade;
          $course4Remark = $request->course4Remark;

          $course4 = DB::table('year_four')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course4,
            'score' => $course4Score,
            'grade' => $course4Grade,
            'remark' => $course4Remark
          ]);

          //fifth course
          $course5 = $request->course5;
          $course5Score = $request->course5Score;
          $course5Grade = $request->course5Grade;
          $course5Remark = $request->course5Remark;

          $course5 = DB::table('year_four')
          ->insert(
            [
            'semester' => 'first',
            'alumni_id' => $alumni_id,
            'course' => $course5,
            'score' => $course5Score,
            'grade' => $course5Grade,
            'remark' => $course5Remark
          ]);

        return redirect(url('admin/transcript4Second/'.$alumni_id));
    }

    public function transcript4Second()
    {//get alumni_id
        $alumni_id = request()->segment(3);
        return view('admin.transcript4Second', compact('alumni_id'));
    }
    public function transcript4SecondSubmit(Request $request)
    {
          //dd($request);

          $course1 = $request->course1;
          $alumni_id = $request->alumni_id;
          $scoreCourse1First = $request->scoreCourse1First;
          $course1Grade = $request->course1Grade;
          $course1Remark = $request->course1Remark;
          $course1 = DB::table('year_four')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course1,
            'score' => $scoreCourse1First,
            'grade' => $course1Grade,
            'remark' => $course1Remark
          ]); //->get();


          //second course
          $course2 = $request->course2;
          $course2Score = $request->course2Score;
          $course2Grade = $request->course2Grade;
          $course2Remark = $request->course2Remark;

          $course2 = DB::table('year_four')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course2,
            'score' => $course2Score,
            'grade' => $course2Grade,
            'remark' => $course2Remark
          ]);

          //third course
          $course3 = $request->course3;
          $course3Score = $request->course3Score;
          $course3Grade = $request->course3Grade;
          $course3Remark = $request->course3Remark;
          $course3 = DB::table('year_four')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course3,
            'score' => $course3Score,
            'grade' => $course3Grade,
            'remark' => $course3Remark
          ]);

          //fourth course
          $course4 = $request->course4;
          $course4Score = $request->course4Score;
          $course4Grade = $request->course4Grade;
          $course4Remark = $request->course4Remark;

          $course4 = DB::table('year_four')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course4,
            'score' => $course4Score,
            'grade' => $course4Grade,
            'remark' => $course4Remark
          ]);

          //fifth course
          $course5 = $request->course5;
          $course5Score = $request->course5Score;
          $course5Grade = $request->course5Grade;
          $course5Remark = $request->course5Remark;

          $course5 = DB::table('year_four')
          ->insert(
            [
            'semester' => 'second',
            'alumni_id' => $alumni_id,
            'course' => $course5,
            'score' => $course5Score,
            'grade' => $course5Grade,
            'remark' => $course5Remark
          ]);

          DB::table('transcript_applications')
          ->where('alumni_id', $alumni_id)
          ->update([
            'status' => 'completed'
          ]);

          return 'Print Transcript';
        //return redirect(url('admin/transcript4Second/'.$alumni_id));
    }


    public function showUploadTranscriptResult()
    {
       return view('admin.showUploadTranscriptResult');
    }
    public function completeReport()
    {
       return "complete Report";
    }
    public static function compiledTranscript($alumni_id)
    {
        echo 'Compiled Transcript';
        /*
        if($transcript_status == 'completed')
        {
          echo "<a href='#' title='Download Student Copy'>Download</a>";
        }
        else{
          ?>
          <input type="text" readonly value="Transcript Not Ready" class="btn-danger">
          <?php
        }*/
        //echo "<br/><b>$args </b><br/>";
    }

    public function showPayments()
    {
      $myPayment = DB::table('payments')->select("*")->orderBy('id', 'desc')->paginate(5); //->get();
      //$myPayment = json_decode(json_encode($myPayment)); //it will return you stdclass object
      //$myPayment = json_decode(json_encode($myPayment),true); //it will return you data in array

      /*
      $myPayment = DB::table('payments')
      ->where('alumni_id', 1)
      ->select("*")
      ->orderBy('id', 'desc') /*->paginate(5); /* /
      ->get();*/
      //$myPayment = json_decode(json_encode($myPayment)); //it will return you stdclass object
      //$myPayment = json_decode(json_encode($myPayment),true); //it will return you data in array
      //dd($myPayment);
      return view('admin.showPayments', compact('myPayment'));
        //return view('admin.showPayments');
    }

    public function payments()
    {

        return 'hello';

    }

    public function applications()
    {
      $applications = DB::table('transcript_applications')
      ->select("*")
      ->where('status','!=', 'completed')->orderBy('id', 'desc')->paginate(5); //->get();
      //$applications = json_decode(json_encode($applications)); //it will return you stdclass object
      //$applications = json_decode(json_encode($applications),true); //it will return you data in array

      //$myPayment = json_decode(json_encode($myPayment)); //it will return you stdclass object
      //$myPayment = json_decode(json_encode($myPayment),true); //it will return you data in array
      //dd($myPayment);
      return view('admin.showApplications', compact('applications'));
    }

}
