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
        $this->middleware('auth:api', ['except' => ['login']]);
    } 

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */


    public function register(Request $request){

        $this->validate($request, [
            'fullname' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone'=>'required|min:11|unique:users',
            'password'=>'required'
        ]);

       try {

            $user = new User;
            $user->name = $request->input('fullname');
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


    public function  profile(){

        // $email = Auth::user()->email;

        // $getDB = DB::table('users')->where('email', $email)->get();

        // //return $getDB;


        return response()->json(['user' => $this->guard()], 200);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'user' => $this->guard()->user(),
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200);
    }

    

}