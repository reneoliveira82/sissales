<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contato;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class ContatoController extends Controller
{
    protected $model;
    protected $pag = 'recadast_suprev';
    private $view_permission = 'view_recadastramento';
    protected $edit_permission = 'edit_recadastramento';

    public function __construct(Contato $contato)
    {
        $this->model = $contato;
        
    }
    public function updateContato(Request $req, $id){
     
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }
        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));

        try {
            $dados = $req->all();

            if ($this->model::find($id)->update($dados)) {
               //Salva log
                $dados_log = [
                    'id_user' => Auth::user()->id,
                    'id_servidor' => $dados['id_servidor'],
                    'atualizado_em_data' => Carbon::now()       
                ];
                Log::create($dados_log);

                return redirect()->back()->with('msg', $this->mensagem(1, 'O registro foi alterado!'));
            } else {
                return redirect()->back()->with('msg', $this->mensagem(2));
            }
        }catch(QueryException $e){
            return redirect()->back()->with('msg', $this->mensagem(3));
        }
    }
}
