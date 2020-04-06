<?php



namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use DB;
use Tymon\JWTAuth\JWTAuth;



class SavingsPlanController extends Controller{

    public function __construct(){

        $this->middleware('auth:api', ['except' => ['login']]);
    }


     /*
     // eSave Customer specify the following specification for their savings schedule
     * Savings purpose for rent,school
     * Amount
     * Frequency (daily, weekly or monthly)
     * end date
     *   

    */

    public function eSaver(Request $request){


    
        // We expect the following input keys from the user
            // purpose
            //amount
            //timer
            //end_date


        // validate request
        $this->validate(
            $request, [
                "purpose"=>"required",
                "amount"=>"required",
                "timer"=>"required",
                "end_date"=>"required",
                
        ]);

        //insert this values to database table "esaver_account"

        try{

            $inputData = [
                "purpose"=>$request->input('purpose'),
                "user_id"=> rand(),
                "amount"=>$request->input('amount'),
                "timer"=>$request->input('timer'),
                "end_date"=>$request->input("end_date"),
                "created_date"=> date('Y-md H:i a'),
                "statu" => 0
            ];



            $insertDB = DB::table("esaver_account")->insert($inputData);
            if($insertDB){

                return response()->json(['message'=>"eSaver Account Created Successfully", "success"=>true], 200);
            }
            else{
                return response()->json(['message'=>'Unable to insert into database', "success"=>false], 402);
            }
    }
        catch(\Exception $e){

            return response()->json(['message'=>'Unable to submit', 'success'=> false], 401);
        }

    }

    /*
    * this is the payment method for updating wallet
    * We except the user to post a request with the following key values
    * // Amount
    * // purpose
    * // payment date
    * // User Unique Identification
    */

    public function payments(Request $request){

        //get the wallet
        //purpose






    }

}