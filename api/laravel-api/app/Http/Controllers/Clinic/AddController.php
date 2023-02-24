<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master;

class AddController extends Controller
{
    private $params = [
        'user_id' => '',
        'foo_id' => '',
    ];

    // 顧客
    private $clinic_add_form = [
        'updated_at' => null,
        'upd_user_id' => null,
        'upd_action' => null,
        'category_type' => null,
        'use_flag' => null,
        'clinic_name' => null,
        'clinic_address' => null,
        'latitude' => null,
        'longitude' => null,
        'prefecture_cd' => null,
    ];

    public function addClinic()
    {
        $prefectures = Master::all();
        return $prefectures;
    }
}
