<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login()
    {
        if ($token = Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $data = [
                'token' => $token,
                'user' => $user
            ];
            return $this->sendResponse($data, 'Logged in successfully!');
        } else {
            return $this->sendError('Login failed!');
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'password2' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        if ($user->save()) {
            $token = JWTAuth::attempt(['email' => $user->email, 'password' => $request->password]);
            $data = [
                'token' => $token,
                'user' => $user
            ];
            return $this->sendResponse($data, 'User created successfully.');
        } else {
            return $this->sendError('Error on registration');
        }
    }

    public function test()
    {
        $data = [
            'time' => time(),
            'user' => Auth::user()
        ];
        return $this->sendResponse($data, 'Test OK');

    }
}
