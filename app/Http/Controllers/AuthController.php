<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','test']]);
    }

    public function login()
    {
        if ($token = Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();

            $data = [
                'token' => $token,
                'user' => new UserResource($user)
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
                'user' => new UserResource($user)
            ];
            return $this->sendResponse($data, 'User created successfully.');
        } else {
            return $this->sendError('Error on registration');
        }
    }

    public function profile()
    {
        $user = Auth::user();

        return $this->sendResponse(new UserResource($user));

    }

    /**
     * Update user.
     */
    public function update(UserRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_country_code = $request->input('phone_country_code');
        $user->phone_number = $request->input('phone_number');
        $user->language = $request->input('language');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return $this->sendResponse(new UserResource($user), 'User updated successfully.');
    }

    public function test()
    {
        $data =  [
            'message' => 'test OK',
            'lang' => App::getLocale(),
            'test' => __('test', ['lang' => App::getLocale()])
        ];

        return $this->sendResponse(compact('data'));

    }
}
