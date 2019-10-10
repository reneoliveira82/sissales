<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PerfilAcesso;

class PerfilAcessoController extends Controller
{
    protected $model;
    protected $pag = 'perfil_acesso';
    private $view_permission = 'view_perfil_acesso';
    protected $create_permission = 'create_perfil_acesso';
    protected $edit_permission = 'edit_perfil_acesso';
    protected $delete_permission = 'delete_perfil_acesso';

    public function __construct(PerfilAcesso $perfil_acesso)
    {
        $this->model = $perfil_acesso;
    }

    public function index()
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->view_permission))
            return redirect()->back();

        $registros = $this->model::all();
        return view("view.$this->pag.index", compact('registros'));
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
