<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Login

use Illuminate\Support\Facades\Route;

Route::get('/', ['as' => 'login', 'uses' => 'Controller\LoginController@index']);
Route::get('info', ['as' => 'info', 'uses' => 'Controller\LoginController@info']);
Route::get('inactive', ['as' => 'inactive', 'uses' => 'Controller\LoginController@inactive']);
Route::get('verifica/dados', ['as' => 'verifica.dados', 'uses' => 'Controller\UserController@verificaDadosAjax']);
//Route::post('/login/entrar', ['as' => 'login.entrar', 'uses' => 'Controller\LoginController@entrar']);

##################################### SISTEMA - CARTA DE SERVIÇO #####################################
$this->group(['namespace' => 'Controller', 'middleware' => 'auth'], function () {
    
    //Home
    Route::get('home', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    //Route::get('home/dados/servico', ['as' => 'home.dados.servico', 'uses' => 'HomeController@dadosServico']);

   
    //Recadastro Suprev
    Route::get('recadast_suprev', ['as' => 'recad_suprev.index', 'uses' => 'ServidorController@index']);
    Route::get('recadast_suprev/tabela', ['as' => 'recad_suprev.tabela', 'uses' => 'ServidorController@tabelaAjax']);
    Route::get('pesquisar/recadast_suprev/tabela', ['as' => 'pesquisar.recad_suprev.tabela', 'uses' => 'ServidorController@buscaServidor']);
    Route::get('cad_suprev/{id?}', ['as' => 'recad_suprev.cad', 'uses' => 'ServidorController@cadastrar']);
    Route::post('recadast_suprev/insert', ['as' => 'recad_suprev.insert', 'uses' => 'ServidorController@insert']);
    Route::post('recadast_suprev/update/{id?}', ['as' => 'recad_suprev.update', 'uses' => 'ServidorController@updateServidor']);
    Route::post('rel_recadastramento/update', ['as' => 'rel_recadastramento.update_servidor', 'uses' => 'ServidorController@updateStatus']);
    
  
    //Recadastro Suprev Endereco
    Route::post('recadast_suprev/endereco/update/{id?}', ['as' => 'recad_suprev_endereco.update', 'uses' => 'EnderecoController@updateEndereco']);
    
    //Recadastro Suprev Doc
    Route::post('recadast_suprev/doc/update/{id?}', ['as' => 'recad_suprev.update_doc', 'uses' => 'ServidorController@updateServidor']);
    Route::post('recadast_suprev/contato/update/{id?}', ['as' => 'recad_suprev.update_contato', 'uses' => 'ContatoController@updateContato']);
    Route::post('recadast_suprev/contato/certidao_obito/{id?}', ['as' => 'recad_suprev.certidao_obito', 'uses' => 'ServidorController@showCertidao']);

    //Perfil de Acesso
    Route::get('perfil_acesso', ['as' => 'perfil_acesso.index', 'uses' => 'PerfilAcessoController@index']);
    Route::get('perfil_acesso/tabela', ['as' => 'perfil_acesso.tabela', 'uses' => 'PerfilAcessoController@tabelaAjax']);
    Route::post('perfil_acesso/insert', ['as' => 'perfil_acesso.insert', 'uses' => 'PerfilAcessoController@insert']);
    Route::put('perfil_acesso/update/{id}', ['as' => 'perfil_acesso.update', 'uses' => 'PerfilAcessoController@update']);
    Route::post('perfil_acesso/delete/{id}', ['as' => 'perfil_acesso.delete', 'uses' => 'PerfilAcessoController@delete']);
    
    //Perfil Permissão
    Route::get('perfil_permissao/{id}', ['as' => 'perfil_permissao.index', 'uses' => 'PerfilPermissaoController@index']);
    Route::post('perfil_permissao/insert', ['as' => 'perfil_permissao.insert', 'uses' => 'PerfilPermissaoController@insertPermissao']);
    Route::post('perfil_permissao/delete/{id}', ['as' => 'perfil_permissao.delete', 'uses' => 'PerfilPermissaoController@delete']);
    
    
    //Usuários
    Route::get('usuario', ['as' => 'usuario.index', 'uses' => 'UserController@index']);
    Route::get('usuario_aprovar', ['as' => 'usuario.aprovar.solicitacao.conta', 'uses' => 'UserController@aprovarSolicitacaoConta']);
    Route::get('usuario/tabela', ['as' => 'usuario.tabela', 'uses' => 'UserController@tabelaAjax']);
    Route::get('cad_usuario/{id?}', ['as' => 'usuario.cad', 'uses' => 'UserController@cadastrar']);
    Route::get('aprovar/cad_usuario/{id?}/{acao?}', ['as' => 'usuario.cad.aprovar', 'uses' => 'UserController@cadastrar']);
    Route::post('usuario/insert', ['as' => 'usuario.insert', 'uses' => 'UserController@insertUser']);
    Route::put('usuario/update/{id}', ['as' => 'usuario.update', 'uses' => 'UserController@updateUsuario']);
    Route::get('usuario/delete/{id}', ['as' => 'usuario.delete', 'uses' => 'UserController@delete']); 

    //Perfil de acesso para usuário
    Route::post('servico/insert/perfiluser', ['as' => 'user.insert.perfil', 'uses' => 'PerfilUserController@insertPerfilUser']);
    Route::post('servico/delete/perfiluser/{id}', ['as' => 'user.delete.perfil', 'uses' => 'PerfilUserController@deletePerfilUser']);
    Route::get('servico/dados/perfilacesso', ['as' => 'user.dados.perfilacesso', 'uses' => 'PerfilUserController@dadosPerfilAcessoAjax']);

    //Situação de recadastramento
    Route::get('situacao_recadastramento',['as'=>'rel_recadastramento.index', 'uses'=> 'SituacaoRecadastramentoController@index']);
    Route::get('situacao_recadastramento/tabela', ['as' => 'rel_recadastramento.tabela', 'uses' => 'SituacaoRecadastramentoController@tabelaAjax']);
    Route::get('pesquisar/situacao_recadastramento/tabela', ['as' => 'pesquisar.rel_recadastramento.tabela', 'uses' => 'SituacaoRecadastramentoController@buscaEmRecadastramento']);

    //Relatório de recadastramento
    Route::get('rel_em_recadastramento',['as'=>'rel_em_recadastramento.index', 'uses'=> 'RelEmRecadastramentoController@index']);
    Route::get('rel_em_recadastramento/tabela', ['as' => 'rel_em_recadastramento.tabela', 'uses' => 'RelEmRecadastramentoController@tabelaAjax']);
    Route::get('pesquisar/rel_em_recadastramento/tabela', ['as' => 'pesquisar.rel_em_recadastramento.tabela', 'uses' => 'RelEmRecadastramentoController@buscaEmRecadastramento']);
    
    //Relatório de suspenso
    Route::get('rel_suspenso',['as'=>'rel_suspenso.index', 'uses'=> 'RelSuspensoController@index']);
    Route::get('rel_suspenso/tabela', ['as' => 'rel_suspenso.tabela', 'uses' => 'RelSuspensoController@tabelaAjax']);
    Route::get('pesquisar/rel_suspenso/tabela', ['as' => 'pesquisar.rel_suspenso.tabela', 'uses' => 'RelSuspensoController@buscaEmRecadastramento']);
    

    //Relatório de recadastrado
    Route::get('rel_recadastrados',['as'=>'rel_recadastrados.index', 'uses'=> 'RecadastradoController@index']);
    Route::get('rel_recadastrados/tabela', ['as' => 'rel_recadastrados.tabela', 'uses' => 'RecadastradoController@tabelaAjax']);
    Route::get('pesquisar/rel_recadastrados/tabela', ['as' => 'pesquisar.rel_recadastrados.tabela', 'uses' => 'RecadastradoController@buscaRecadastrados']);
    

    //Relatório de inativos
    Route::get('rel_inativos',['as'=>'rel_inativos.index', 'uses'=> 'InativosController@index']);
    Route::get('rel_inativos/tabela', ['as' => 'rel_inativos.tabela', 'uses' => 'InativosController@tabelaAjax']);
    Route::get('pesquisar/rel_inativos/tabela', ['as' => 'pesquisar.rel_inativos.tabela', 'uses' => 'InativosController@buscaInativos']);

    //Relatório de visita domiciliar
    Route::get('rel_visita',['as'=>'rel_visita.index', 'uses'=> 'RelatorioVisitaController@index']);
    Route::get('rel_visita/tabela',['as'=>'rel_visita.tabela', 'uses'=> 'RelatorioVisitaController@tabelaAjax']);
    Route::get('pesquisar/rel_visita/tabela', ['as' => 'pesquisar.rel_visita.tabela', 'uses' => 'RelatorioVisitaController@buscaVisita']);
    
    
    //Produtos
    Route::get('produtos', ['as' => 'produtos.index', 'uses' => 'ProdutoController@index']);
    Route::get('produtos/tabela', ['as' => 'produtos.tabela', 'uses' => 'ProdutoController@tabelaAjax']);
    Route::get('cad_produto/{id?}', ['as' => 'cad_produto.cad', 'uses' => 'ProdutoController@cadastrar']);
    Route::post('cad_produto/insert', ['as' => 'produtos.insert', 'uses' => 'ProdutoController@insertProdutos']);
    Route::put('cad_produto/update/{id}', ['as' => 'produtos.update', 'uses' => 'ProdutoController@alterarProdutos']);
    Route::get('cad_produto/delete/{id}', ['as' => 'cad_produto.delete', 'uses' => 'ProdutoController@delete']); 

    
    //Clientes
    Route::get('cliente', ['as' => 'cliente.index', 'uses' => 'ClienteController@index']);
    Route::get('cliente/tabela', ['as' => 'cliente.tabela', 'uses' => 'ClienteController@tabelaAjax']);
    Route::get('cad_cliente/{id?}', ['as' => 'cad_cliente.cad', 'uses' => 'ClienteController@cadastrar']);
    Route::post('cad_cliente/insert', ['as' => 'cliente.insert', 'uses' => 'ClienteController@insertCliente']);
    Route::put('cad_cliente/update/{id}', ['as' => 'cliente.update', 'uses' => 'ClienteController@alterarCliente']);
    Route::get('cad_cliente/delete/{id}', ['as' => 'cad_cliente.delete', 'uses' => 'ClienteController@delete']); 

    //Vendas
     Route::get('vendas', ['as' => 'vendas.index', 'uses' => 'VendasController@index']);
     Route::get('vendas/tabela', ['as' => 'vendas.tabela', 'uses' => 'VendasController@tabelaAjax']);
     Route::get('pesquisar/vendas/tabela', ['as' => 'pesquisar.vendas.tabela', 'uses' => 'ProdutoController@buscarProdutos']);
 
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
