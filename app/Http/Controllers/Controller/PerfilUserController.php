<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PerfilUser;
use App\User;
use App\Models\PerfilPermissao;

class PerfilUserController extends Controller
{
    protected $model;
    protected $pag = 'cad_usuario';

    public function __construct(PerfilUser $perfil_user)
    {
        $this->model = $perfil_user;
    }

    public function insertPerfilUser(Request $req)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        try {
            $dados = $req->all();
            if (!$this->model::where('user_id', $dados['user_id'])->where('perfil_acesso_id', $dados['perfil_acesso_id'])->exists()) {
                if ($this->model::create($dados)) {
                    $registros = User::find($dados['user_id']);
                    return redirect()->route('usuario.cad', compact('registros'))->with('msg', $this->mensagem(1, 'Perfil de acesso adicionado!'))->with('active', 'perfil_usuario');
                } else {
                    return redirect()->back()->with('msg', $this->mensagem(2));
                }
            } else {
                return redirect()->back()->with('msg', $this->mensagem(2, 'Este perfil de acesso já existe para este usuário!'))->with('active', 'perfil_usuario');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('msg', $this->mensagem(3))->with('active', 'perfil_usuario');
            //return $e->getMessage();
        }
    }

    public function deletePerfilUser($id)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        try {
            if ($this->model::find($id)->delete()) {
                return redirect()->back()->with('msg', $this->mensagem(1, 'O registro foi excluído!'))->with('active', 'perfil_usuario');
            } else {
                return redirect()->back()->with('msg', $this->mensagem(2))->with('active', 'perfil_usuario');
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('msg', $this->mensagem(3))->with('active', 'perfil_usuario');
            //return $e->getMessage();
        }
    }

    public function dadosPerfilAcessoAjax(Request $req)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }
        
        $id = $req['perfil_acesso_id'];
        $dados = PerfilPermissao::join('perfil_acessos', 'perfil_acessos.id', '=', 'perfil_permissaos.perfil_acesso_id')
        ->join('permissaos', 'permissaos.id', '=', 'perfil_permissaos.permissao_id')
        ->select('perfil_permissaos.*', 'perfil_acessos.nome as pa_nome', 'permissaos.nome as p_nome', 'permissaos.descricao as p_descricao', 'permissaos.grupo as p_grupo')
        ->where('perfil_permissaos.perfil_acesso_id', '=', $id)
        ->orderBy('permissaos.grupo')->get();
        return $dados;
    }
}
