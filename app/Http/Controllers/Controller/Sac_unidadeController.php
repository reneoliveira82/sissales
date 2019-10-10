<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sac_unidade;
use App\Models\SacTipoUnidade;

class Sac_unidadeController extends Controller
{

    protected $model;
    protected $pag = 'sac_unidade';
    private $view_permission = 'view_sac_unidade';
    protected $create_permission = 'create_sac_unidade';
    protected $edit_permission = 'edit_sac_unidade';
    protected $delete_permission = 'delete_sac_unidade';
    public function __construct(Sac_unidade $Sac_unidade)
    {
        $this->model = $Sac_unidade;
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
       
        $registros = $this->model::leftjoin('sac_tipo_unidades', 'sac_tipo_unidades.id', '=', 'sac_unidades.id_sac_tipo_unid')
        ->select('sac_unidades.*', 'sac_tipo_unidades.tipo_descricao as tipo_descricao')
        ->get();
       
       
        return view("view.$this->pag.table", compact('registros'));

    }
    public function cadastrar($id = null){
       
        $sac_tipo_unidades = SacTipoUnidade::all();
        $registros = $this->model::leftjoin('sac_tipo_unidades', 'sac_tipo_unidades.id', '=', 'sac_unidades.id_sac_tipo_unid')
        ->select('sac_unidades.*', 'sac_tipo_unidades.tipo_descricao as tipo_descricao')
        ->find($id);
        return view("view.$this->pag.cad_unidade_sac", compact('registros','sac_tipo_unidades'));
    }
    public function insertUnidadeSac(Request $req){
       
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->create_permission))
            return redirect()->back();

        try {
         
            $dados = $req->all();
     
            if ($lastId = $this->model->create($dados)) {
                $registros = $this->model->find($lastId->id);
                return redirect()->route('cad_unidade_sac.cad', compact('registros'))->with('msg', $this->mensagem(1, 'Unidade SAC cadastrada com sucesso!'));
            } else {
                
                return redirect()->back()->with('msg', $this->mensagem(2));
            }   
        } catch (QueryException $e) {            
            return redirect()->back()->with('msg', $this->mensagem(3));
            return $e->getMessage();
        }   
    }

    public function alterarUnidadeSac(Request $req, $id){
        
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));

            try {
                $dados = $req->all();
             
                if ($this->model::find($id)->update($dados)) {
                    return redirect()->back()->with('msg', $this->mensagem(1, 'A Unidade SAC foi alterada com sucesso!'));
                } else {
                    return redirect()->back()->with('msg', $this->mensagem(2));
                }
            } catch (QueryException $e) {
                return redirect()->back()->with('msg', $this->mensagem(3));
                
            }
    }

    public function deleteUnidadeSac(){

    }

}
