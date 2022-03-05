<?php

namespace App\Action;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\PersonalUserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AttemptLoginAction
{
    public function doLogin(LoginRequest $request, $withJson = false)
    {
        # code...
        $credential = $request->validated();
        $user = User::where('email', '=', $credential['email'])->first();

        if ($user == null) {
            # code...
            if ($withJson) {
                return response()->json([
                    'message' => 'User not found',
                    'error' => true,
                    'code' => 403,
                    'data' => null,
                ]);
            } else {
                return false;
            }
        }

        if (!Auth::attempt($request->validated())) {
            # code...
            if ($withJson) {
                return response()->json([
                    'message' => 'Wrong password',
                    'error' => true,
                    'code' => 403,
                    'data' => null,
                ]);
            } else {
                return false;
            }
        }

        // delete current token
        if ($user->tokens() != null) {
            $user->tokens()->delete();
        }

        // create new token
        $token = $user->createToken('token', ['motivasi:user'])->plainTextToken;

        if (!$withJson) {
            return true;
        }

        return response()->json([
            'message' => 'logged in',
            'code' => 200,
            'error' => false,
            'data' => new PersonalUserResource($user, $token),
        ]);
    }
}
