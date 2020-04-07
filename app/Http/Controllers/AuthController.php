<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use DB;
use Tymon\JWTAuth\JWTAuth;



class AuthController extends Controller
{


    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */


    public function _construct(){

        //$this->middleware('auth');
        $this->middleware('auth:api', ['except' => ['login','register']]);
    } 

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */


    public function register(Request $request){

        $randx =  str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ');

       $userID = substr($randx,0, 8);

        $this->validate($request, [
            'fullname' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone'=>'required|min:11|unique:users',
            'password'=>'required'
        ]);

       try {

            $user = new User;
            $user->name = $request->input('fullname');
            $user->user_id = $userID;
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            $user->save();

            //return response()->json(['user' => $user, 'message' => 'CREATED'], 201);
           return $this->login($request); 

        }catch (\Exception $e){
            return response()->json(['message' => 'User Registration Failed'], 409);
        }
    
    }

    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }



    public function loginx(Request $request){


        $this->validate($request, [
            'email'   => 'required',
            'password'=> 'required',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['errors' => ['result'=>'Unauthorized!!!... Authentication credential not found']], 401);
        }

        //return $token;

        return $this->respondWithToken($token);
      }


    public function  profile(Request $request){


  
         //$user = JWTAuth::parseToken()->authenticate();


         return Auth::user()->email;
     
        // $email = Auth::user()->email;

        // $getDB = DB::table('users')->where('email', $email)->get();

        // //return $getDB;


        //return response()->json(['user' => Auth::user()], 200);
    }

    

    public function guard() {
        return Auth::guard('api');
    }

}