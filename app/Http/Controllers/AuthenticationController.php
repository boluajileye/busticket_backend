<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthenticationController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!auth()->validate($credentials)) {
            return response()->json([
                "error" => true,
                "code" => 400,
                "message" => "Invalid email or Password"
            ], 400);
        }

        if (! $token = auth()->attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorized',
                "message" => "Login to continue"
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     *  Register new User
     */

     public function register(Request $request){
        $validator = Validator::make([
            "email"=>$request->email,
            "name"=>$request->name,
            "password"=>$request->password,
        ],[
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|min:6',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => 'Invalid Credientials Supplied',
                "message" => $validator->errors()
            ], 401);
        }

        $userExists = User::where('email', $request->email)->exists();
        if($userExists){
            return response()->json([
                'error' => 'Invalid Credientials Supplied',
                "message" => "User with this email already exist"
            ], 401);
         }
         $register = User::create($request->all());
         if ($register) {
             return response()->json(['message' => 'User Registered Successfully']);
         }
     }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
