<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $resource = new UserResource($user);
        $resource->additional(['message' => "O usuário foi criado com sucesso."]);
        return $resource;
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }
}
