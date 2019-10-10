<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Servidor;

class RelatorioVisitaController extends Controller
{
    protected $pag = 'rel_visita';
    protected $model;

    private $view_permission = 'recadast_suprev';
    protected $create_permission = 'create_recadast_suprev';
    protected $edit_permission = 'edit_recadast_suprev';
    protected $delete_permission = 'delete_recadast_suprev';

    public function __construct(Servidor $recadastrados){
        $this->model = $recadastrados;        
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
            $result = $this->model::leftjoin('status', 'status.id', '=', 'servidors.id_status')->where('cod_status','=', 3)->get()->count();
            $registros = $this->model::leftjoin('status', 'status.id', '=', 'servidors.id_status')->where('cod_status','=', 3)->get();
        return view("view.$this->pag.table", compact('registros','result'));

    }

    public function buscaVisita(Request $req){

        $data_inicial = str_replace("/", "-", $req->dt_inicial);
        $data_final = str_replace("/", "-", $req->dt_final);
        $dt_inicial = date('Y-m-d', strtotime($data_inicial));
        $dt_final = date('Y-m-d', strtotime($data_final));
        $result = $this->model::leftjoin('status', 'status.id', '=', 'servidors.id_status')->where('cod_status','=', 3)->get()->count();
        $registros = $this->model::leftjoin('status', 'status.id', '=', 'servidors.id_status')
        ->whereDate('servidors.updated_at','>=',$dt_inicial)->whereDate('servidors.updated_at','<=',$dt_final)->where('status.cod_status',3)->get();
        return view("view.$this->pag.table", compact('registros','result'));
    }




}
