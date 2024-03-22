<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);

        if(Auth::attempt($credentials))
        {
            $user = Auth::user();
            dd($user);
            return response()->json([
                'status' => 200 ,
                'message' => 'Login Success',
                'data' => $user,
                'token' =>  $user->createToken('api_user')->plainTextToken,
            ]);
        }

    }
}

