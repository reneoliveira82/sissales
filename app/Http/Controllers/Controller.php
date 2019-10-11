<?php

namespace App\Http\Controllers;

use App\Models\LogServico;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkUserActive(){
        if (isset(Auth::user()->ativo) && Auth::user()->ativo == 'N'){
            Auth::logout();
            return false;
        }else{
            return true;
        }
    }

    public function checkPermission($permission)
    {
        return Gate::denies($permission);
    }

    // CADASTRA OS DADOS DE UMA DETERMINADA TABELA
    public function insert(Request $req)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

       if ($this->checkPermission($this->create_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));

        try {
            $dados = $req->all();
            //dd($dados);
            if ($this->model->create($dados)) {
                return redirect()->back()->with('msg', $this->mensagem(1));
            } else {
                return redirect()->back()->with('msg', $this->mensagem(2));
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('msg', $this->mensagem(3));
            //return $e->getMessage();
        }
    }

    // CADASTRA OS DADOS DE UMA DETERMINADA TABELA
    public function update(Request $req, $id)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));

        try {
            $dados = $req->all();
            $dados['ativo'] = isset($dados['ativo']) ? 'S' : 'N';
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

    //DELETA UM DADO DE UMA DETERMINADA TABELA PELO SEU ID
    public function delete($id)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }
        
        if ($this->checkPermission($this->delete_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));

        try {
            if ($this->model::find($id)->delete()) {
                return redirect()->back()->with('msg', $this->mensagem(1, 'O registro foi excluído!'));
            } else {
                return redirect()->back()->with('msg', $this->mensagem(2));
            }
        } catch (QueryException $e) {
            return redirect()->back()->with('msg', $this->mensagem(3));
            //return $e->getMessage();
        }
    }

    //MOSTRA UM DADO DE UMA DETERMINADA TABELA PELO SEU ID
    public function buscarPorId($id)
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        $registros = $this->model::find($id);
        return view("view.$this->pag.index", compact('registros'));
    }

    //VERIFICA DADOS JÁ CADASTRADOS
    public function verificaDadosAjax(Request $req)
    {      
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }
          
        if ($this->model::where($req->campo, $req->valor)->exists()){
            return 1;
        }else{
            return 0;
        }
    }

    //MENSAGEM DE SUCESSO E ERRO
    public function mensagem($tipo, $texto = null)
    {
        switch ($tipo) {
            case 1:
                $texto = ($texto == null) ? 'O registro foi salvo!' : $texto;
                return '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>  <strong>Sucesso: </strong> ' . $texto . ' </div>';
                break;
            case 2:
                $texto = ($texto == null) ? 'Não foi possível completar a ação, tente novamente.' : $texto;
                return '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <strong>Informação: </strong> ' . $texto . ' </div>';
                break;
            case 3:
                $texto = ($texto == null) ? 'Não foi possível completar a ação!' : $texto;
                return '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>  <strong>Excessão: </strong> ' . $texto . ' </div>';
                break;
        }
    }

    //LOG SERVIÇO - Registrar a criação, atualização, finalização, validação e publicação dos serviços
    public function logServico($id_servico, $por, $em, $enum = null, $v_enum = null)
    {
        if ($enum == null){
            $acao = ['id_servico' => $id_servico, "$por" => Auth::user()->id, "$em" => Carbon::now()];
        }else{
            $acao = ['id_servico' => $id_servico, "$por" => Auth::user()->id, "$em" => Carbon::now(), $enum => $v_enum];
        }
        return LogServico::create($acao);
    }
}
