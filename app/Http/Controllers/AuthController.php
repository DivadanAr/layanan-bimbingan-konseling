<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        $rules=[
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ];
        
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
        ]);

        $token = $user->createToken('Personal Access Token')->plainTextToken;

        $response = ['user'=>$user, 'token'=>$token];

        return response()->json($response, 200);
    }    

    function Login(Request $R)
    {
        $user = User::where('name', $R->name)->first();

        if ($user != '[]' && Hash::check($R->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = ['status' => 200, 'token' => $token, 'user' => $user, 'message' => 'Login Successfully!'];
            return response()->json($response);
        } else if ($user == '[]') {
            $response = ['status' => 500, 'message' => 'No account found with this username'];
        } else {
            $response = ['status' => 500, 'message' => 'Wrong username or password! please try again'];
        }
    }
}