<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;

class ClienteController extends Controller
{

    protected $model;
    protected $pag = 'cliente';
    private $view_permission = 'view_cliente';
    protected $create_permission = 'create_cliente';
    protected $edit_permission = 'edit_cliente';
    protected $delete_permission = 'delete_cliente';
    public function __construct(Cliente $Cliente)
    {
        $this->model = $Cliente;
    }


    public function index()
    {
        $registros = $this->model::all();
        return view("view.$this->pag.index", compact('registros'));

        if ($this->checkPermission($this->view_permission))
        return redirect()->back();

        $registros = $this->model::all();
        return view("view.$this->pag.index", compact('registros'));
    }
    public function tabelaAjax ()
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }
       
        $registros = $this->model::select('clientes.*')->get();
       
       
        return view("view.$this->pag.table", compact('registros'));

    }
    public function cadastrar($id = null){
       
        $cliente = Cliente::all();
        $registros = $this->model::select('clientes.*', 'clientes.nome_cliente','clientes.cpf', 'clientes.telefone','clientes.email')
        ->find($id);
        return view("view.$this->pag.cad_cliente", compact('registros','clientes'));
    }
    public function insertCliente(Request $req){
       
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->create_permission))
            return redirect()->back();

        try {
         
            $dados = $req->all();
     
            if ($lastId = $this->model->create($dados)) {
                $registros = $this->model->find($lastId->id);
                return redirect()->route('cad_cliente.cad', compact('registros'))->with('msg', $this->mensagem(1, 'Cliente cadastrada com sucesso!'));
            } else {
                
                return redirect()->back()->with('msg', $this->mensagem(2));
            }   
        } catch (QueryException $e) {            
            return redirect()->back()->with('msg', $this->mensagem(3));
            return $e->getMessage();
        }   
    }

    public function alterarCliente(Request $req, $id){
        
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));

            try {
                $dados = $req->all();
             
                if ($this->model::find($id)->update($dados)) {
                    return redirect()->back()->with('msg', $this->mensagem(1, 'O Cliente foi alterada com sucesso!'));
                } else {
                    return redirect()->back()->with('msg', $this->mensagem(2));
                }
            } catch (QueryException $e) {
                return redirect()->back()->with('msg', $this->mensagem(3));
                
            }
    }

    public function deleteCliente(){

    }
}
