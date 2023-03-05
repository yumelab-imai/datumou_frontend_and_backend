<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController; //追記
use App\Http\Controllers\Common\MasterController;
use App\Http\Controllers\Clinic\indexController;
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

// Route::get('/', function () {
//     // return redirect('mypage');
// });

// サンプル用
// Route::namespace('Sample')->group(function () {
//     // コントローラーの記述を省できる（以下はControllers/Sample以下）
//     Route::prefix('sample')->group(function () {
//         // 左側のパスの記述を省略できる（以下は前にsampleが付くと考える）
//         Route::get('/', 'SampleController@index');
//         Route::get('image', 'SampleController@assessmentImage');
//         Route::get('pdf', 'SamplePdfController@sampleview');
//         Route::get('pdf/timecard', 'SamplePdfController@viewTimeCardPdf')->name('sample.pdf.timecard');
//         Route::get('pdf/{file_name}/{seq_id?}', 'SamplePdfController@viewPdf')->name('sample.pdf');
//         Route::post('pdf/modal', 'SamplePdfController@viewPdfModal')->name('sample.pdf.modal');
//     });
//     Route::prefix('sample/code')->group(function () {
//         Route::get('/', 'CodeController@index'); // コードマスタ取得
//     });
//     Route::prefix('sample/calc-search-date')->group(function () {
//         Route::get('/', 'CalcSearchDateController@index'); // 日付計算
//     });
//     Route::prefix('sample/calc-price')->group(function () {
//         Route::get('/', 'CalcPriceController@index'); // 金額計算
//     });
//     Route::prefix('sample/aa-exhibit')->group(function () {
//         Route::get('/', 'SampleController@aaExhibitSample');
//     });
//     Route::get('sample/holidays', 'SampleController@holidays');
//     Route::get('sample/tack-seal', 'SampleController@tackSeal');
// });

// Route::post('/login', [AuthController::class, 'login']); //追加
// Route::post('/logout', [AuthController::class, 'logout']); //追加
// Route::post('/register', [AuthController::class, 'register']); //追加

// Default Routing
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/user', function (Request $request) {
// return ["book1", "book2", "book3"];
//     return response()->json([
//     'outings' => $outings
// ], 200);
// return  response()->json(['outings' => "111", 'www' => "222"], 200);
//     return ['id' => '1', 'name' => 'lain', 'email' => 'lain@gmail.com', 'password' => 'wwwwwwww'];
// });

Route::get('prefectures', [MasterController::class, 'prefectures'])->name('common.prefectures');

Route::post('add/clinic', [indexController::class, 'addClinic']);
// オプションパラメータ
Route::post('clinic/list/{category_type?}', [indexController::class, 'getClinicList']);
