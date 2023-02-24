<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController; //追記
use App\Http\Controllers\Common\MasterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']); //追加
Route::post('/logout', [AuthController::class, 'logout']); //追加
Route::post('/register', [AuthController::class, 'register']); //追加

// Default Routing
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user', function (Request $request) {
    // return ["book1", "book2", "book3"];
    //     return response()->json([
    //     'outings' => $outings
    // ], 200);
    // return  response()->json(['outings' => "111", 'www' => "222"], 200);
    return ['id' => '1', 'name' => 'lain', 'email' => 'lain@gmail.com', 'password' => 'wwwwwwww'];
});

Route::get('/books', function () {
    return ['book1', 'book2', 'book3'];
});

Route::get('/prefectures', [MasterController::class, 'prefectures']);
