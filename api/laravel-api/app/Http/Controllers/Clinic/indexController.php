<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Master;
use App\Models\Clinic;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    // private $params = [
    //     'user_id' => '',
    //     'foo_id' => '',
    // ];

    // 顧客
    private $clinic_add_form = [
        'created_at' => null,
        'created_user_id' => null,
        'created_action' => null,
        'updated_at' => null,
        'upd_user_id' => null,
        'upd_action' => null,
        'use_flag' => 1,
        // バリデーション項目
        'category_type' => null,
        'clinic_name' => null,
        'clinic_address' => null,
        'latitude' => null,
        'longitude' => null,
        'prefecture_cd' => null,
    ];

    // ※リクエストは、デフォルトのミドルウェアにより、「トリム」「空文字⇒null」の処理が行われる
    private $validation_list = [
        'clinic_addition' => [
            'category_type' => 'required | integer',
            // 'use_flag' => '',
            'clinic_name' => 'required | string',
            'clinic_address' => 'required | string',
            // ※要注意
            // 少数のレンジを超えるとエラーになるが、まだ実装できていない
            // バリデータルール内にカンマが存在すると別の引数に扱われるらしい。(regex が通らない)
            'latitude' => 'required | numeric',
            // 'latitude' => 'required | numeric | regex:/^[-]?((([0-8]?[0-9])(\.[0-9]{6}))|90(\.0{6})?)$/',
            // 'latitude' => ['required , numeric, regex:/^[-]?((([0-8]?[0-9])(\.[0-9]{6}))|90(\.0{6})?)$/'],
            'longitude' => 'required | numeric',
            // 'longitude' =>
            //     'required | numeric | regex:/^[-]?(((([1][0-7][0-9])|([0-9]?[0-9]))(\.[0-9]{6}))|180(\.0{6})?)$/',
            'prefecture_cd' => 'required | between:1,47',
        ],
    ];

    public function addClinic(Request $request)
    {
        // ajax response info
        $result = [
            'result' => false,
            'message' => null,
            'errors' => [],
            'response_data' => null,
        ];

        try {
            $post = $request->input('requestData');
            $validator = Validator::make($post, $this->validation_list['clinic_addition']);

            if ($validator->fails()) {
                $result['message'] = 'バリデーションに失敗しました。';
                $result['errors'] = $validator->errors();
                $result['response_data'] = $post;
                return response()->json($result, Response::HTTP_OK);
            }

            // 複数代入対策
            $post_validated = $validator->safe()->only(array_keys($this->validation_list['clinic_addition']));
            $post_validated = $validator->validated();
            $add_info = [
                'created_at' => Carbon::now(),
                'created_user_id' => 0,
                'created_action' => 'クリニック登録画面からの追加',
                'updated_at' => Carbon::now(),
                'upd_user_id' => 0,
                'upd_action' => 'クリニック登録画面からの追加',
                'use_flag' => 1, //反映
            ];
            $insert_info = array_merge($post_validated, $add_info);
            //トランザクション
            DB::beginTransaction();
            DB::enableQueryLog();
            $clinic = new Clinic();
            $clinic = $clinic->create($insert_info);
            Log::debug('クリニック登録フォーム SQLログ');
            // SQLログ出力
            Log::debug(DB::getQueryLog());
            //トランザクション終了
            DB::commit();
            if (true) {
                $result['result'] = true;
                $result['message'] = '登録に成功しました。';
                $result['response_data'] = $post;
            }
            Log::debug('登録に成功しました。');

            return response()->json($result, Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::debug(DB::getQueryLog());
            DB::rollBack();
            Log::debug('クリニック登録フォームでの不具合');
            Log::error($e);
            $result['message'] = '予期せぬエラーが発生しました。';
            $result['errors'] = [];
            $result['response_data'] = null;
            return response()->json($result, Response::HTTP_BAD_GATEWAY);
        }
    }

    public function getClinicList(Request $request, $category_type = 1)
    {
        // ajax response info
        $result = [
            'result' => false,
            'message' => null,
            'errors' => [],
            'response_data' => null,
        ];

        try {
            DB::enableQueryLog();
            // $clinics = Clinic::all();
            // $clinics = Clinic::where('delete_flag', DELETE_FLAG_OFF);
            $clinics = Clinic::where('delete_flag', 0)
                ->where('category_type', $category_type)
                ->get();
            Log::debug('クリニック一覧所得 SQLログ');
            // dump($clinics);
            // var_dump($clinics);
            // dd($clinics);
            // SQLログ出力
            Log::debug(DB::getQueryLog());
            if (empty($clinics)) {
                $result['message'] = 'バリデーションに失敗しました。';
                $result['errors'] = [];
                $result['response_data'] = $clinics;
                return response()->json($result, Response::HTTP_OK);
            } else {
                $result['result'] = true;
                $result['message'] = 'クリニックの一覧所得に成功しました。';
                $result['response_data'] = $clinics;
            }
            Log::debug('検索に成功しました。');

            return response()->json($result, Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::debug('クリニック一覧所得での不具合');
            Log::debug(DB::getQueryLog());
            Log::error($e);
            $result['message'] = '予期せぬエラーが発生しました。';
            $result['errors'] = [];
            $result['response_data'] = [];
            return response()->json($result, Response::HTTP_BAD_GATEWAY);
        }
    }
}
