<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserSchoolsCollection;
use App\Models\User;
use App\Models\UserDevice;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth:api', ['except' => ['login', 'register', 'test', 'resetPassword', 'resetPasswordConfirm']]);
    }

    public function login()
    {
        $credentials = [
            $this->userIdentifier => request($this->userIdentifier),
            'password' => request('password'),
            'status' => User::STATUS_ACTIVE
        ];

        if ($token = Auth::attempt($credentials)) {
            $user = Auth::user();

            $schools = $user->schools()->get();

            $data = [
                'token' => $token,
                'user' => new UserResource($user),
                'schools' => new UserSchoolsCollection($schools),
            ];
            Log::info('login', ['user' => Auth::id(), 'ip' => \request()->ip()]);

//            $sms = new SmsModel('+905422212549', 'MD deneme1');
//            $sms->send();

            return $this->sendResponse($data, __('Logged in successfully!'));
        } else {
            Log::error('login', ['user' => request($this->userIdentifier), 'ip' => \request()->ip()]);

            return $this->sendError(__('Login failed!'));
        }
    }

    public function register(UserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);
        $user->status = config('app.user_auto_approval') ? User::STATUS_ACTIVE : User::STATUS_PASSIVE;

        if ($user->save()) {
            $token = JWTAuth::attempt(['email' => $user->email, 'password' => $request->password]);
            $data = [
                'token' => $token,
                'user' => new UserResource($user)
            ];
            Log::info('register', ['user' => $user->id, 'ip' => \request()->ip()]);

            return $this->sendResponse($data, 'User created successfully.');
        } else {
            Log::error('register', ['user' => request($this->userIdentifier), 'ip' => \request()->ip()]);

            return $this->sendError(__('Error on registration'));
        }
    }

    public function profile()
    {
        $user = Auth::user();
        $schools = $user->schools()->get();

        $data = [
            'user' => new UserResource($user),
            'schools' => new UserSchoolsCollection($schools),
        ];

        return $this->sendResponse($data);

    }

    /**
     * Update current user.
     */
    public function update(ProfileUpdateRequest $request)
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
        Log::info('profile update', ['user' => $user->id, 'ip' => \request()->ip()]);

        return $this->sendResponse(new UserResource($user), __('User updated successfully.'));
    }

    public function resetPassword(Request $request)
    {
        // TODO: Country Code
        if (config('app.user_identifier') == 'phone_number') {
            $this->validate($request, [
                'phone_number' => 'required',
            ]);

            $checkIfExists = DB::table('password_resets')
                ->where('email', $request->phone_number)
                ->where('created_at', '>', Carbon::now()->subSeconds(env('RESET_PASSWORD_EXPIRE_SMS')))
                ->first();

            if ($checkIfExists) {
                return $this->sendError(__('Reset code has already been sent'));
            }

            $token = rand(100000, 999999);
            DB::table('password_resets')->insert([
                'email' => $request->phone_number,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            $to = config('app.defaults.phone_code') . $request->phone_number;
            $message = __("Your password reset code: ") . $token;

            // Send sms
            //$sms = new SmsModel($to, $message);
            //$sms->send();

            return $this->sendResponse(__('SMS sent'));
        }

        if (config('app.user_identifier') == 'email') {
            $this->validate($request, [
                'email' => 'required|email',
            ]);

            ResetPassword::createUrlUsing(function (User $user, string $token) {
                return config('app.url') . '/reset-password?token=' . $token;
            });

            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT
                ? $this->sendResponse(__('Password reset link sent'))
                : $this->sendError(__('Failed to send reset link'));
        }

    }

    public function resetPasswordConfirm(Request $request)
    {
        if ($request->isMethod('POST')) {
            if (config('app.user_identifier') == 'phone_number') {
                $this->validate($request, [
                    'token' => 'required',
                    'phone_number' => 'required',
                    'password' => ['required', 'confirmed', 'min:6'],
                ]);

                $checkIfExists = DB::table('password_resets')
                    ->where('email', $request->phone_number)
                    ->where('token', $request->token)
                    ->where('created_at', '>', Carbon::now()->subMinutes(5)) // 5dk içinde şifre değiştirme yapılmalı
                    ->first();

                if (!$checkIfExists) {
                    return $this->sendError(__('Code is invalid or expired'));
                }

                // Find user
                $user = User::where([
                    'phone_number' => $request->phone_number,
                    'status' => User::STATUS_ACTIVE
                ])->firstOrFail();

                // Change password
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();

                event(new PasswordReset($user));

                return $this->sendResponse(__('Password has been changed'));

            } else {
                $this->validate($request, [
                    'token' => 'required',
                    'email' => 'required|email',
                    'password' => ['required', 'confirmed', 'min:6'],
                ]);

                $status = Password::reset(
                    $request->only('email', 'password', 'password_confirmation', 'token'),
                    function ($user) use ($request) {
                        $user->forceFill([
                            'password' => Hash::make($request->password),
                        ])->save();

                        event(new PasswordReset($user));
                    }
                );

                if ($status == Password::PASSWORD_RESET) {
                    return $this->sendResponse(__('Password updated'));
                }

                throw ValidationException::withMessages([
                    'email' => [trans($status)],
                ]);
            }

        } else {
            if (config('app.user_identifier') == 'phone_number') {
                $this->validate($request, [
                    'phone_number' => 'required',
                    'token' => 'required'
                ]);

                $checkIfExists = DB::table('password_resets')
                    ->where('email', $request->phone_number)
                    ->where('token', $request->token)
                    ->where('created_at', '>', Carbon::now()->subSeconds(env('RESET_PASSWORD_EXPIRE_SMS')))
                    ->first();

                if ($checkIfExists) {
                    return $this->sendResponse(__('Code is valid'));
                }

                return $this->sendError(__('Code is invalid or expired'));
            }
            // Sorun: $token doğrulanmıyor.
            /*  $this->validate($request, [
                  'token' => 'required|string',
              ]);

              $token = $request->get('token');

              dd(Password::getUser(['token' => $token]));

              $resetToken = DB::table('password_resets')
                  ->where('token', bcrypt($token))
                  ->first();

              dd($resetToken, $token, bcrypt($token));*/

        }
    }

    public function test()
    {
        $data = [
            'message' => 'test OK',
            'lang' => App::getLocale(),
            'test' => __('test', ['lang' => App::getLocale()])
        ];

        return $this->sendResponse(compact('data'));

    }

    public function device(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'deviceName' => 'nullable',
            'deviceModel' => 'nullable',
            'status' => 'required|integer',
        ]);

        $userDevice = UserDevice::select('id')
            ->where('token', $request->token)
            ->where('user_id', $this->getUser()->id)
            ->first();

        if ($userDevice) {
            $userDevice->update([
                'status' => $request->status
            ]);

            Log::info('UserDevice updated', ['id' => $userDevice->id]);
        } else {
            $userDevice = UserDevice::create([
                'token' => $request->token,
                'status' => $request->status,
                'user_id' => $this->getUser()->id,
                'name' => $request->deviceName,
                'model' => $request->deviceModel,
            ]);

            Log::info('UserDevice created', ['id' => $userDevice->id]);
        }

        if ($userDevice) {
            return $this->sendResponse($userDevice);
        }

        Log::error('UserDevice create failed.');
        return $this->sendError('Create failed.');
    }
}
