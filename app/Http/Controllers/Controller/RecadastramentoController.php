<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recadastramento;


class RecadastramentoController extends Controller
{
    protected $model;
    protected $pag = 'recadast_suprev';
    private $view_permission = 'view_recadast_suprev';
    protected $create_permission = 'create_recad_suprev';
    protected $edit_permission = 'edit_recad_suprev';
    protected $delete_permission = 'delete_recad_suprev';

    public function __construct(Recadastramento $recadast)
    {
        $this->model = $recadast;
    }

    public function index()
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        // if ($this->checkPermission($this->view_permission))
        //     return redirect()->back();

         $registros = $this->model::all();
        return view("view.$this->pag.index");
    }

    public function tabelaAjax()
    {
         
       $registros = $this->model::all();
        return view("view.$this->pag.table", compact('registros'));
    }

    public function cadastrar($id = null)
    {
        return view("view.$this->pag.cad_suprev", compact('registros'));
    }
}
