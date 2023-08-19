<?php

namespace App\Http\Controllers;

use App\Http\Components\Paginator;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * List users
     */
    public function index(Request $request)
    {
        $allowedSort = ['id', 'name', 'email', 'created_at'];
        $users = User::query();
        $users = Paginator::sort($request, $users, $allowedSort)->paginate(1);

        $data = [
            'users' => UserResource::collection($users),
            'pagination' => Paginator::paginate($users)
        ];
        return $this->sendResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display user
     */
    public function show(int $id)
    {
        $user = User::findOrFail($id);
        $data = [
            'users' => new UserResource($user),
        ];

        return $this->sendResponse($data);
    }

    /**
     * Update user.
     */
    public function update(Request $request, int $id)
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_country_code = $request->input('phone_country_code');
        $user->phone_number = $request->input('phone_number');
        $user->language = $request->input('language');

        $user->save();

        return $this->sendResponse(new UserResource($user), 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
