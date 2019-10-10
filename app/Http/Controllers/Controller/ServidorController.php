<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EstadoCivil;
use App\Models\Nacionalidade;
use App\Models\Servidor;
use App\Models\Endereco;
use App\Models\TipoLogradouro;
use Illuminate\Database\QueryException;
use App\Http\Controllers\EnderecoController;
use App\Models\Log;
use App\Models\PaisOrigem;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Statu;

class ServidorController extends Controller
{
    protected $model;
    protected $pag = 'recadast_suprev';
    private $view_permission = 'view_recadastramento';
    protected $edit_permission = 'edit_recadastramento';
   

    public function __construct(Servidor $servidor)
    {
        $this->model = $servidor;
        
    }

    public function index()
    {
        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }

        if ($this->checkPermission($this->view_permission))
            return redirect()->back();

        $registros = $this->model::all();
        return view("view.$this->pag.index");
    }

    public function tabelaAjax()
    {
         
       $registros = $this->model::all();
        return view("view.$this->pag.table", compact('registros'));
    }

    public function cadastrar($id = null)
    {
        $estado_civil = EstadoCivil::all();
        $nacionalidade = Nacionalidade::all();
        $endereco = Endereco::all();
        $tipo_logradouro = TipoLogradouro::all();  
        $pais_origem = PaisOrigem::all();    
        $status = Statu::all();
      
        $registros = $this->model::leftjoin('nacionalidades', 'nacionalidades.id', '=', 'servidors.id_nacion')
                                ->leftjoin('estado_civils', 'estado_civils.id', '=', 'servidors.id_est_civil')
                                ->leftjoin('enderecos', 'enderecos.id_servidor', '=', 'servidors.id')
                                ->leftjoin('tipo_logradouros','tipo_logradouros.id','=', 'enderecos.id_tipo_lograd')
                                ->leftjoin('contatos', 'contatos.id_servidor', '=', 'servidors.id')
                                ->leftjoin('status', 'status.id', '=', 'servidors.id_status')
                                ->select('servidors.*', 'servidors.id as servidor_id',  'estado_civils.id as ec_id', 'nacionalidades.id as nc_id',
                                        'enderecos.id as endereco_id','enderecos.cep as cep', 'enderecos.logradouro as logradouro', 'enderecos.numero as numero', 'enderecos.bairro as bairro',
                                        'tipo_logradouros.descricao_tipo_lograd as descricao_tipo_lograd','tipo_logradouros.id as id_tipo_lograd', 
                                        'contatos.ddd1 as ddd1','contatos.tel_resid_1 as tel_resid_1', 'contatos.ddd2 as ddd2','contatos.tel_resid_2 as tel_resid_2',
                                        'contatos.ddd_cel as ddd_cel','contatos.celular as celular', 'contatos.email as email','enderecos.uf_endereco as uf_endereco',
                                        'enderecos.compl_logradouro as compl_logradouro', 'status.desc_status as desc_status', 'contatos.id as contato_id')
                                ->find($id);
                               
                         
        return view("view.$this->pag.cad_suprev", compact('registros','estado_civil','nacionalidade','tipo_logradouro','endereco','pais_origem','status'));
    }

    public function recadastrar(){
        return view("view.$this->pag.cad_suprev", compact('registros'));
    }

    
    public function updateServidor(Request $req, $id){

        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }  
         
   
        try {
            if ($this->checkPermission($this->edit_permission))
                return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
            $dados = $req->all();
            //dd($dados);
            if ($this->model::find($id)->update($dados)) {

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
    
    public function buscaServidor(Request $req){

        $rec_matricula = $req->r_matricula;
        $rec_cpf = str_replace(".", "",$req->r_cpf);
        $rec_cpf = str_replace("-", "", $rec_cpf);
        $rec_nome = $req->r_nome;          
        
        if($rec_cpf == '' && $rec_nome == ''){
            $registros = $this->model::where('matricula', $rec_matricula)->get(); 
        }else{
            $registros = $this->model::where('matricula', $rec_matricula)->orWhere('cpf', $rec_cpf)
            ->orWhere('nome', 'like', ucwords($rec_nome.'%'))->get();  
            
            if($rec_matricula == '' && $rec_nome == ''){
                $registros = $this->model::where('cpf', $rec_cpf)->get(); 
            }else{
                $registros = $this->model::where('matricula', $rec_matricula)->orWhere('cpf', $rec_cpf)
                ->orWhere('nome', 'like', ucwords($rec_nome.'%'))->get();   
            } 
        }
        
       
           
        return view("view.$this->pag.table", compact('registros'));
    }
    public function updateStatus(Request $req){

        if ($this->checkUserActive() ==  false){
            return redirect()->route('login');
        }
        
        if ($this->checkPermission($this->edit_permission))
            return redirect()->back()->with('msg', $this->mensagem(2, 'Você não tem permissão para completar esta ação!'));
         
        if(isset($req['codigo_id']) &&  $req['codigo_id'] != "" && !isset($id)){
            $codigo_id = explode(',',$req['codigo_id']);    
        
            try {
                foreach ($codigo_id as $c){ 
                    $dados = [
                        'id_status' => '4'             
                    ];        
                    $resultado;
                if ($this->model::where('id', $c)->update($dados)) {
                    $dados_log = [
                        'id_user' => Auth::user()->id,
                        'id_servidor' => $c,
                        'atualizado_em_data' => Carbon::now()       
                    ];
                    Log::create($dados_log);
                    $resultado = true;                    
                } else {
                    $resultado = false;                   
                }            
            }
                if( $resultado == true){
                    return redirect()->back()->with('msg', $this->mensagem(1, 'O registro foi alterado!'));
                }else{
                    return redirect()->back()->with('msg', $this->mensagem(2));
                }
            }catch(QueryException $e){
                return redirect()->back()->with('msg', $this->mensagem(3));
            }
        }else{
            return redirect()->back()->with('msg', $this->mensagem(2,'Selecione pelo menos uma opção!'));
        }
    }
    public function showCertidao($id){
        $registros = $this->model::select('servidors.cert_obito as cert_obito')
        ->find($id);
        return view("view.$this->pag.cad_suprev", compact('registros'));
        
    }
    
}
