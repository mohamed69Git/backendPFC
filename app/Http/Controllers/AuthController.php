<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function apiemail()
    {
        $emails =  DB::table('users')->select('email')->get();
        return $emails->toJson();
    }
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed'
        ]);

        User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        return response()->json([
            'status_code' => 200,
            'message' => 'user created successfully'
        ]);

    }


    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $user = User::where('email', '=', $fields['email'])->first();
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response()->json([
                'message' => 'Informations incorrectes'
            ]);
        }

        $token = $user->createToken('appdepensetoken')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ]);

    }

    public function logout(Request $request)
    {
        $answer = $request->user()->currentAccessToken()->delete();
        if ($answer)
            return response()->json([
                'message' => 'Logged out'
            ]);
        else return response()->json([
            'mesage' => 'on a pas pu vous deconnecter'
        ]);
    }
    public function user(Request $request)
    {
        return User::find($request->id);
    }

    public function seterror()
    {
        return response()->json([
            'message' => 'l\'utilisateur n\'est pas connecte'
        ]);
    }
}
