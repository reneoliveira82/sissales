<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PerfilPermissao;
use App\Models\Permissao;
use App\Models\PerfilAcesso;

class PerfilPermissaoController extends Controller
{
    protected $model;
    protected $pag = 'perfil_permissao';
    private $view_permission = 'view_perfil_permissao';
    protected $create_permission = 'create_perfil_permissao';
    protected $edit_permission = 'edit_perfil_permissao';
    protected $delete_permission = 'delete_perfil_permissao';

    public function __construct(PerfilPermissao $perfil_permissao)
    {
        $this->model = $perfil_permissao;
    }

    public function index($id)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->view_permission))
            return redirect()->back();

        //$registros = $this->model::all(); 
        $perfil_acesso = PerfilAcesso::find($id);
        $registros = $this->model::join('perfil_acessos', 'perfil_acessos.id', '=', 'perfil_permissaos.perfil_acesso_id')
                                ->join('permissaos', 'permissaos.id', '=', 'perfil_permissaos.permissao_id')
                                ->select('perfil_permissaos.*', 'perfil_acessos.nome as pa_nome', 'permissaos.id as p_id', 'permissaos.nome as p_nome', 'permissaos.descricao as p_descricao', 'permissaos.grupo as p_grupo')
                                ->where('perfil_permissaos.perfil_acesso_id', '=', $id)
                                ->orderBy('permissaos.grupo')->get();
        $permissoes = Permissao::orderBy('grupo')->get();
        
        if (empty($perfil_acesso) || $perfil_acesso->nome == 'Administrador'){
            return redirect()->route('perfil_acesso.index');
        }else{
            return view("view.$this->pag.index", compact('perfil_acesso', 'registros', 'permissoes'));
        }
    }

    
    public function insertPermissao(Request $req)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }
        
        if ($this->checkPermission($this->create_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));

        try {
            $dados = $req->all();
            if (!empty($req->perfil_acesso_id && $req->perfil_nome != 'Administrador')){
                $this->model::where('perfil_acesso_id', '=', $req->perfil_acesso_id)->delete();
                if (!empty($dados['permissao_id'])){
                    foreach ($dados['permissao_id'] as $permissoes){
                        if (!$this->model::where('perfil_acesso_id', $req->perfil_acesso_id)->where('permissao_id', $permissoes)->exists()){
                            $this->model->create(['permissao_id' => $permissoes ,'perfil_acesso_id' => $dados['perfil_acesso_id']]);                    
                        }else{
                            return redirect()->back()->with('msg', $this->mensagem(2, 'Esta permissão já existe!'));
                        }
                    }
                }
                    return redirect()->back()->with('msg', $this->mensagem(1));
            }else{
                return redirect()->route('perfil_acesso.index');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('msg', $this->mensagem(3));
            //return $e->getMessage();
        }
    }
}
