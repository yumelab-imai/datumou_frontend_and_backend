<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoreController extends Controller
{
    public function __construct()
    {
        //
    }
    public function indexAction()
    {
        echo 'Use library';
        exit();
    }
}
