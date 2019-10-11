<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\PerfilAcesso;
use App\Models\PerfilUser;

class UserController extends Controller
{
    protected $model;
    protected $pag = 'usuario';
    private $view_permission = 'view_user';
    protected $create_permission = 'create_user';
    protected $edit_permission = 'edit_user';
    protected $delete_permission = 'delete_user';

    public function __construct(User $user)
    {
        $this->model = $user;
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

    public function tabelaAjax(Request $req)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        $registros = $this->model::all();
        return view("view.$this->pag.table", compact('registros'));

    }

    public function cadastrar($id = null, $acao = null)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->create_permission))
            return redirect()->back();


        $perfil_acesso = PerfilAcesso::orderBy('nome')->get();
        if ($id == null) {
            return view("view.$this->pag.cad_usuario", compact('perfil_acesso'));
        } else {
            $registros = $this->model::find($id);
            $perfil_user = PerfilUser::join('perfil_acessos', 'perfil_acessos.id', '=', 'perfil_users.perfil_acesso_id')->select('perfil_users.id as pu_id', 'perfil_acessos.*')->where('perfil_users.user_id', '=', $id)->orderBy('perfil_acessos.nome')->get();
            if ($registros) {
                $pagina = ($acao == 'aprovacao') ? 'usuario_aprovar_cad' : 'cad_usuario';
                return view("view.$this->pag.$pagina", compact('registros', 'perfil_acesso', 'perfil_user', 'acao'));
            } else {
                return redirect()->route('usuario.index');
            }
        }
    }

    public function insertUser(Request $req)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }
        
        if ($this->checkPermission($this->create_permission))
            return redirect()->back();
            
        try {
            $dados = $req->all();
            if ($lastId = $this->model->create($dados)) {
                $registros = $this->model->find($lastId->id);
                return redirect()->route('usuario.cad', compact('registros'))->with('msg', $this->mensagem(1, 'O registro do Usuário foi salvo!'));
            } else {
                return redirect()->back()->with('msg', $this->mensagem(2));
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('msg', $this->mensagem(3));
            //return $e->getMessage();
        }
    }

    public function updateUsuario(Request $req, $id)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));

        try {
            $dados = $req->all();
            $dados['ativo'] = isset($dados['ativo']) ? 'S' : 'N';
            $dados['solicita_conta'] = ($dados['ativo'] == 'S') ? 'A' : 'N';
            if ($this->model::find($id)->update($dados)) {
                return redirect()->back()->with('msg', $this->mensagem(1, 'O registro foi alterado!'));
            } else {
                return redirect()->back()->with('msg', $this->mensagem(2));
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('msg', $this->mensagem(3));
            //return $e->getMessage();
        }
    }

    public function aprovarSolicitacaoConta()
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->view_permission))
            return redirect()->back();

        $registros = $this->model::where('solicita_conta', '=', 'S')->get();
        return view("view.$this->pag.usuario_aprovar", compact('registros'));
    
    }

    
}
