<?php 

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Funcao;

Class FuncaoController extends Controller
{
    protected $model;
    protected $pag = 'funcao';
    private $view_permission = 'view_funcao';
    protected $create_permission = 'create_funcao';
    protected $edit_permission = 'edit_funcao';
    protected $delete_permission = 'delete_funcao';
    

    public function __construct(Funcao $funcao)
    {
        $this->model = $funcao;
    }

    public function index()
    {       if ($this->checkUserActive() ==  false){
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