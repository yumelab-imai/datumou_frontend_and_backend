<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Master;
use Validator;
use Carbon\Carbon;

class indexController extends Controller
{
    // private $params = [
    //     'user_id' => '',
    //     'foo_id' => '',
    // ];

    // 顧客
    private $clinic_add_form = [
        'updated_at' => null,
        'upd_user_id' => null,
        'upd_action' => null,
        'category_type' => null,
        'use_flag' => 1,
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
                $result['message'] = 'バリデーションに失敗しました';
                $result['errors'] = $validator->errors();
                $result['response_data'] = $post;
                return response()->json($result, Response::HTTP_OK);
            }
            //トランザクション
            $post_validated = $validator->validated();
            $add_info = [
                'updated_at' => Carbon::now(),
                'upd_user_id' => 0,
                'upd_action' => 'クリニック登録画面からの追加',
                'use_flag' => 1, //反映
            ];
            $insert_info = array_merge($post_validated, $add_info);
            if (true) {
                $result['result'] = true;
                $result['message'] = 'リクエストが成功しました';
                $result['response_data'] = $post;
            }
            return response()->json($result, Response::HTTP_OK);
        } catch (Exception $e) {
            $result['message'] = '予期せぬエラーが発生しました';
            $result['errors'] = [];
            $result['response_data'] = null;
            return response()->json($result, Response::HTTP_BAD_GATEWAY);
        }
    }
}
