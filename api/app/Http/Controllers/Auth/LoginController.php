<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::query()
            ->where('email', '=', $email)
            ->first();

        if (! $user) {
            return response()->json(['error' => '認証に失敗しました'], 401);
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $token = Auth::user()->createToken('AccessToken')->plainTextToken;

            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => '認証に失敗しました'], 401);
    }
}
