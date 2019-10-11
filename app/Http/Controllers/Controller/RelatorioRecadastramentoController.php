<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recadastramento;

class RelatorioRecadastramentoController extends Controller
{
    protected $pag = 'rel_recadastramento';
    protected $model;
 

    private $view_permission = 'recadast_suprev';
    protected $create_permission = 'create_recadast_suprev';
    protected $edit_permission = 'edit_recadast_suprev';
    protected $delete_permission = 'delete_recadast_suprev';

    public function __construct(Recadastramento $recadast)
    {
        $this->model = $recadast;
    }

    public function index(){  

        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->view_permission))
            return redirect()->back();
        return view("view.$this->pag.index");
    }
    public function tabelaAjax()
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->view_permission))
            return redirect()->back();

        $registros = $this->model::all();
        return view("view.$this->pag.table", compact('registros'));
    }
}
