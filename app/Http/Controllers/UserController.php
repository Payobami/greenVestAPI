<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use DB;
use Tymon\JWTAuth\JWTAuth;



class UserController extends Controller{
 /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */


    public function _construct(){

        $this->middleware('auth');
    } 




    public function  profile(){

        //$email = Auth::user()->email;

        //$getDB = DB::table('users')->get();

        return Auth::user();

        //return auth()->user();


        //return "heelo";
    }



    
    /**
     * Get all User.
     *
     * @return Response
     */
    public function allUsers()
    {
         return response()->json(['users' =>  User::all()], 200);
    }

    /**
     * Get one user.
     *
     * @return Response
     */
    public function singleUser($id)
    {

        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }


    public function guard() {
        return Auth::guard('api');
    }



}