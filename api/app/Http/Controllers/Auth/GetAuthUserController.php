<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetAuthUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = request()->user();

        return response()->json([
            'user' => $user,
            'role' => $user->getRoleNames(),
        ], 200);
    }
}
