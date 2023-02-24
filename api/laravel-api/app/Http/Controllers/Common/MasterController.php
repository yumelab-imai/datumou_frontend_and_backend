<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\Master;
class MasterController extends Controller
{
    public function prefectures()
    {
        // $members = DB::select('select * from members');
        // $data = ['title' => 'メンバーリスト', 'members' => $members];
        // return view('members.index', $data);
        $prefectures = Master::all();
        // return json_encode($prefectures);
        return $prefectures;
    }
}
