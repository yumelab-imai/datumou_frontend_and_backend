<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CoreController;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\Master;
class MasterController extends CoreController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function prefectures()
    {
        $this->indexAction(); // MY_Controller テスト用        // $members = DB::select('select * from members');
        $prefectures = Master::all();
        return $prefectures;
    }
}
