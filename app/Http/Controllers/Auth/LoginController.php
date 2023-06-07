<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('username', $request->validated('username'))->first();

        if (Auth::attempt($request->validated())) {
            return response()->json($user);
        } else {
            return response()->json([
                'errors' => [
                    'username' => [trans('auth.failed')],
                ]
            ], status: 401);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response(200);
    }
}
