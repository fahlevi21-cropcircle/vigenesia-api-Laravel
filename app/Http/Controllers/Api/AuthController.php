<?php

namespace App\Http\Controllers\Api;

use App\Action\AttemptLoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\PersonalUserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    //

    public function login(LoginRequest $request)
    {
        # code...
        $action = new AttemptLoginAction();
        return $action->doLogin($request, true);
    }

    public function register(RegisterRequest $request)
    {
        # code...
        /* $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now()
        ]); */

        return response()->json(
            [
                'message' => 'User registered successfully!',
                'code' => 200,
                'error' => false,
                'data' => null
            ]
        );
    }
}
