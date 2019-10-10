<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orgao;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    protected $model;
    protected $pag = 'home';
    //private $permission = 'view_home';

    public function __construct()
    { }

    public function index()
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }   
        return view("view.$this->pag.index");
    }

    public function dadosServico()
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

    //     if (Gate::check('administrador_da_carta')){
    //         $cadastrados = Servico::where('finalizado', '=', 'N')->get()->count();
    //         $finalizados = Servico::where('finalizado', '=', 'S')->where('validado', '=', 'N')->where('publicado', '=', 'N')->get()->count();
    //         $validados = Servico::where('finalizado', '=', 'S')->where('validado', '=', 'S')->where('publicado', '=', 'N')->get()->count();
    //         $publicados = Servico::where('finalizado', '=', 'S')->where('validado', '=', 'S')->where('publicado', '=', 'S')->get()->count();
    //         $publicar = Servico::where('finalizado', '=', 'S')->where('validado', '=', 'S')->where('publicado', '=', 'N')->get()->count();
    //         $usuarios_aprovar = User::where('solicita_conta', '=', 'S')->count();
    //     }elseif (Gate::check('validate_servico')){
    //         $id_orgao = Auth::user()->id_orgao;
    //         $cadastrados = Servico::select('servicos.*')->where('servicos.id_orgao', '=', $id_orgao)->where('finalizado', '=', 'N')->get()->count();
    //         $finalizados = Servico::select('servicos.*')->where('servicos.id_orgao', '=', $id_orgao)->where('finalizado', '=', 'S')->where('validado', '=', 'N')->where('publicado', '=', 'N')->get()->count();
    //         $validados = Servico::select('servicos.*')->where('servicos.id_orgao', '=', $id_orgao)->where('finalizado', '=', 'S')->where('validado', '=', 'S')->where('publicado', '=', 'N')->get()->count();
    //         $publicados = Servico::select('servicos.*')->where('servicos.id_orgao', '=', $id_orgao)->where('finalizado', '=', 'S')->where('validado', '=', 'S')->where('publicado', '=', 'S')->get()->count();
    //         $publicar = Servico::select('servicos.*')->where('servicos.id_orgao', '=', $id_orgao)->where('validado', '=', 'S')->get()->count();
    //         $usuarios_aprovar = User::where('solicita_conta', '=', 'S')->count();
    //     }else{
    //         $id_orgao = Auth::user()->id_orgao;
    //         $cadastrados = Servico::join('user_servicos', 'user_servicos.servico_id', '=', 'servicos.id')->select('servicos.*')->where('servicos.id_orgao', '=', $id_orgao)->where('finalizado', '=', 'N')->where('user_servicos.user_id', '=', Auth::user()->id)->get()->count();
    //         $finalizados = Servico::join('user_servicos', 'user_servicos.servico_id', '=', 'servicos.id')->select('servicos.*')->where('servicos.id_orgao', '=', $id_orgao)->where('finalizado', '=', 'S')->where('validado', '=', 'N')->where('publicado', '=', 'N')->where('user_servicos.user_id', '=', Auth::user()->id)->get()->count();
    //         $validados = Servico::join('user_servicos', 'user_servicos.servico_id', '=', 'servicos.id')->select('servicos.*')->where('servicos.id_orgao', '=', $id_orgao)->where('finalizado', '=', 'S')->where('validado', '=', 'S')->where('publicado', '=', 'N')->where('user_servicos.user_id', '=', Auth::user()->id)->get()->count();
    //         $publicados = Servico::join('user_servicos', 'user_servicos.servico_id', '=', 'servicos.id')->select('servicos.*')->where('servicos.id_orgao', '=', $id_orgao)->where('finalizado', '=', 'S')->where('validado', '=', 'S')->where('publicado', '=', 'S')->where('user_servicos.user_id', '=', Auth::user()->id)->get()->count();
    //         $publicar = Servico::join('user_servicos', 'user_servicos.servico_id', '=', 'servicos.id')->select('servicos.*')->where('servicos.id_orgao', '=', $id_orgao)->where('finalizado', '=', 'S')->where('validado', '=', 'S')->where('publicado', '=', 'N')->where('user_servicos.user_id', '=', Auth::user()->id)->get()->count();
    //         $usuarios_aprovar = User::where('solicita_conta', '=', 'S')->count();
    //     }
    //     $dados = [
    //         "cadastrados" => $cadastrados,
    //         "finalizados" => $finalizados,
    //         "validados" => $validados,
    //         "publicados" => $publicados,
    //         "publicar" => $publicar,
    //         "usuarios_aprovar" => $usuarios_aprovar
    //     ];
    //     return $dados;
     }

    // public function nomeOrgaoUser()
    // {
    //     if ($this->checkUserActive() ==  false){
    //         return redirect()->route('login');
    //     }

    //     $id_orgao = Auth::user()->id_orgao;
    //     $nomeOrgao = Orgao::Select('nome')->find($id_orgao);

    //     return $nomeOrgao['nome'];
    // }
}
