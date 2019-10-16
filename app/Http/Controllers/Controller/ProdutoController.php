<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produtos;

class ProdutoController extends Controller
{
    protected $model;
    protected $pag = 'produtos';
    private $view_permission = 'view_produtos';
    protected $create_permission = 'create_produtos';
    protected $edit_permission = 'edit_produtos';
    protected $delete_permission = 'delete_produtos';
    public function __construct(Produtos $Produtos)
    {
        $this->model = $Produtos;
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
       
        $registros = $this->model::select('produtos.*')->get();
       
       
        return view("view.$this->pag.table", compact('registros'));

    }
    public function cadastrar($id = null){
       
        $produto = Produtos::all();
        $registros = $this->model::select('produtos.*', 'produtos.cod_produto','produtos.nome_produto','produtos.qtd_produto')
        ->find($id);
        return view("view.$this->pag.cad_produto", compact('registros','produtos'));
    }
    public function insertProdutos(Request $req){
       
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->create_permission))
            return redirect()->back();

        try {
         
            $dados = $req->all();
     
            if ($lastId = $this->model->create($dados)) {
                $registros = $this->model->find($lastId->id);
                return redirect()->route('cad_produto.cad', compact('registros'))->with('msg', $this->mensagem(1, 'Produto cadastrada com sucesso!'));
            } else {
                
                return redirect()->back()->with('msg', $this->mensagem(2));
            }   
        } catch (QueryException $e) {            
            return redirect()->back()->with('msg', $this->mensagem(3));
            return $e->getMessage();
        }   
    }

    public function alterarProdutos(Request $req, $id){
        
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));

            try {
                $dados = $req->all();
             
                if ($this->model::find($id)->update($dados)) {
                    return redirect()->back()->with('msg', $this->mensagem(1, 'O Produto foi alterada com sucesso!'));
                } else {
                    return redirect()->back()->with('msg', $this->mensagem(2));
                }
            } catch (QueryException $e) {
                return redirect()->back()->with('msg', $this->mensagem(3));
                
            }
    }

    public function deleteProduto(){

    }

    public function buscarProdutos (Request $req){
  
        $cod_produto = $req->rec_codigo_prods;
        $nome_produto = $req->rec_nome_prods ;
        if(isset($cod_produto) && !empty($cod_produto)  ){
            $registros =   $this->model::where('cod_produto', $cod_produto)->get();
        }else
        if(isset($nome_produto) && !empty($nome_produto)){
            $registros =   $this->model::where('nome_produto', $nome_produto)->get();
        }else
        if(isset($cod_produto) && !empty($cod_produto) && isset($nome_produto) && !empty($nome_produto)  ){
            $registros =   $this->model::where('cod_produto', $cod_produto)->orwhere('nome_produto', $nome_produto)->get();
        }
      
        return view("view.vendas.produtos.table", compact('registros'));
    }
}
