<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permissao;

class PermissaoController extends Controller
{
    protected $model;
    protected $pag = 'permissao';

    public function __construct(Permissao $permissao)
    {
        $this->model = $permissao;
    }

    public function index()
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        $registros = $this->model::all();
        return view("view.$this->pag.index", compact('registros'));
    }

    public function tabelaAjax()
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }
        
        $registros = $this->model::all();
        return view("view.$this->pag.table", compact('registros'));
    }
}
