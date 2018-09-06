<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Transcript_applications;
//use Illuminate\Http\Request;
class AlumniController extends Controller
{
    public $signature;
    //configure payment gateway
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    { //dd($request);
        /*
        */
        $this->middleware('auth:alumni'); //, ['except' => 'payment']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('alumni');
        return view('alumni.applyNow');
    }
    public function showApplyNow()
    {
      return view('alumni.applyNow');
    }
    public function showApplications()
    {
      $applications = DB::table('transcript_applications')->select('alumni_id','recipient', 'recipient_address','country_id', 'status')->where('alumni_id', Auth::user()->id)->paginate(5); //->get();
      //$applications = json_decode(json_encode($applications)); //it will return you stdclass object
      //$applications = json_decode(json_encode($applications),true); //it will return you data in array
      //echo '<pre>'; print_r($countries);
      return view('alumni.myApplications', compact('applications'));
      //return view('alumni.myApplications')->with('applications','applications'); //['applications' => $applications,]);
    }
    public static function download($transcript_id, $transcript_status)
    {
        if($transcript_status == 'completed')
        {
          echo "Download";
        }
        else{
        }
        //echo "<br/><b>$args </b><br/>";
    }
    public function showPayments()
    {
      return view('alumni.showPayments');
    }
    public function paymentProcessor()
    {
        $payment = DB::table('payments')->select("*")->where('alumni_id', Auth::user()->id)->get();
        $payment = json_decode(json_encode($payment)); //it will return you stdclass object
        $payment = json_decode(json_encode($payment),true); //it will return you data in array
        //echo '<pre>'; print_r($countries);
        //echo "Signature : ".$payment->signature;
        /*
        "id" => 2
    "" => 4298
    "transaction_id" => null
    "customerid" => "bonsoirval@gmail.com1"
    "alumni_id" => "bonsoirval@gmail.com1"
    "amount" => 25000
    "created_at" => "2018-09-02 09:57:57"
    "updated_at" => "2018-09-02 09:57:57"
    "key" => "aa863303b0ee79459162ad55a3aed4f0"
    "txtref" => "5b8c169528583"
    "data" => "aa863303b0ee79459162ad55a3aed4f05b8c16952858325000"
    "memo" => "Payment for transcript"
    "signature" => "785309cd677ffbadf3137e2295c1981adcb7ea8d1cbcd1d39f94a75aba9dc5cd"*/
    $mertid;
    $cetxtref;
    $type = '';
    $signature;
    foreach($payment as $paymentDetail)
    {
        $mertid = $paymentDetail['mertid'];
        $cetxtref = $paymentDetail['txtref'];
        $signature = $paymentDetail['signature'];
    }
        //dd($payment);
        $request = 'mertid='.$mertid.'&transref='.$cetxtref.'&respformat='.$type.'&signature='.$this->signature; //initialize the request variables
        $url = 'https://www.cashenvoy.com/sandbox2/?cmd=requery'; //this is the url of the gateway's test api
        //$url = 'https://www.cashenvoy.com/webservice/?cmd=requery'; //this is the url of the gateway's live api
        $ch = curl_init(); //initialize curl handle
        curl_setopt($ch, CURLOPT_URL, $url); //set the url
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); //return as a variable
        curl_setopt($ch, CURLOPT_POST, 1); //set POST method
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request); //set the POST variables
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//change to true when live
        $response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
        curl_close($ch); //close the curl handle
        //dd(explode("-",$response));
        $split_response = explode("-", $response);
        //echo "Status Code : ".$split_response[1];
        //echo "<br/>Amount Paid : ".$split_response[2];
        //dd($response);
        DB::table('transcript_applications')
        ->where('cetxref', $cetxtref)
        ->where('alumni_id', Auth::user()->id)
        ->update(
              [
                'status' =>'processing',
              ]
          );
          //set flash message
          $status = False;
          if ($split_response[1] == 'C00')
            $status = True;
          if ($status == True) {
              Session::flash('message', 'Transcript Payment Successful and Transcript Processing Started.!');
              Session::flash('alert-class', 'alert-success');
          } else {
              Session::flash('message', 'Error Encountered While Processing Transcript!');
              Session::flash('alert-class', 'alert-danger');
          }
        return redirect(route('alumni.my.applications'));
        //return $response;
    }
    public function apply(Request $request)
    {
        //dd($request);
        $cenurl = route('paymentProcessor');
        $cecustomerid = Auth::user()->email;
        $cemertid = 4298;
        $key = 'aa863303b0ee79459162ad55a3aed4f0';
        $cetxref = uniqid(); // 'A11232132133242';
        $ceamt = $request['amount'];
        $cememo = "Payment for transcript";
        $data = $key.$cetxref.$ceamt;
        $this->signature = hash_hmac('sha256', $data, $key, false);
        //dd($signature);
        DB::table('payments')->insert([
          'mertid'=> $cemertid,
          'customerid' => $cecustomerid,
          'alumni_id' => Auth::user()->id,
          //'transaction_id' => '',
          'amount' => $ceamt,
          'key' => $key,
          'txtref' => $cetxref,
          'data' => $data,
          'memo' => $cememo,
          'signature' => $this->signature,
        ]);
        //insert fresh data into candidates_profile
          DB::table('transcript_applications')->insert(
              [
                'alumni_id' =>  Auth::user()->id,
                'recipient' => $request['recipient'],
                'recipient_address' => $request['recipient_address'],
                'country_id' => $request['country_id'],
                'cetxref' => $cetxref,
                //'amount' => $request['amount'],
              ]
          );
  ?>
          <body onLoad="document.submit2cepay_form.submit()">
            <form method="post" name="submit2cepay_form" action="https://www.cashenvoy.com/sandbox2/?cmd=cepay" target ="_self" >
              <input type="hidden" name="ce_merchantid" value="<?= $cemertid ?>"/>
                <input type="hidden" name="ce_transref" value="<?= $cetxref ?>"/>
                <input type="hidden" name="ce_amount" value="<?= $ceamt ?>"/>
                <input type="hidden" name="ce_customerid" value="<?= $cecustomerid ?>"/>
                <input type="hidden" name="ce_memo" value="<?= $cememo ?>"/>
                <input type="hidden" name="ce_notifyurl" value="<?= $cenurl ?>"/>
                <input type="hidden" name="ce_window" value="parent"/><!-- self or parent -->
                <input type="hidden" name="ce_signature" value="<?= $this->signature ?>"/>
            </form>
          </body>
          <?php
          //$url = 'http://google.com';
      //return Redirect::to($url);
    }
}
