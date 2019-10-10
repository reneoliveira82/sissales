<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log;

class LogController extends Controller
{
    protected $model;

    public function __construct(Log $log)
    {
        $this->model = $log;
    }

    public function index(){

    }

    public function tabelaAjax(Request $reg){

    }

    public function insertLog(Request $req){

    }

}
