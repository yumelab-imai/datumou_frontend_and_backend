<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        //この辺でこれとかも使えそう！
        // $data = $request->all();

        if (Auth::attempt($credentials)) {
            // セッションIDの再発行
            $request->session()->regenerate();
            return response()->json(Auth::user());
        }
        // else文の方が、better
        return response()->json([], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        // CSRFトークンを再生成して、二重送信対策
        // CSRF対策の仕組みを利用。form(CSRF対策済み)を利用した時、input hidden項目と、サーバー側にトークンを保存するが、regenerateToken()した際にサーバー側のトークンが変更されるので二重送信対策が可能となる
        $request->session()->regenerateToken();//わからん

        return response()->json(true);//jsonでboolを返す
    }

    public function register(Request $request)
    {
        // $request->all();は今回使用しない
        $user = ModelUser::create([
            "name" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        Auth::login($user);
        return response()->json($user, 200);
    }
}