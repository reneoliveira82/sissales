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
    Route::get('recadast_suprev', ['as' => 'recad_suprev.index', 'uses' => 'RecadastramentoController@index']);
    Route::get('recadast_suprev/tabela', ['as' => 'recad_suprev.tabela', 'uses' => 'RecadastramentoController@tabelaAjax']);
    Route::get('cad_suprev/{id?}', ['as' => 'recad_suprev.cad', 'uses' => 'RecadastramentoController@cadastrar']);
    Route::post('recadast_suprev/insert', ['as' => 'recad_suprev.insert', 'uses' => 'RecadastramentoController@insert']);
    Route::put('recadast_suprev/update/{id?}', ['as' => 'recad_suprev.update', 'uses' => 'RecadastramentoController@update']);
    Route::get('recadast_suprev/delete/{id}', ['as' => 'recad_suprev.delete', 'uses' => 'RecadastramentoController@delete']);
    
    
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

    //Relatório de recadastramento
    Route::get('rel_recadastramento',['as'=>'rel_recadastramento.index', 'uses'=> 'RelatorioRecadastramentoController@index']);
    Route::get('rel_recadastramento/tabela', ['as' => 'rel_recadastramento.tabela', 'uses' => 'RelatorioRecadastramentoController@tabelaAjax']);

    //Relatório de inativos
    Route::get('rel_inativos',['as'=>'rel_inativos.index', 'uses'=> 'InativosController@index']);
    Route::get('rel_inativos/tabela', ['as' => 'rel_inativos.tabela', 'uses' => 'InativosController@tabelaAjax']);
<<<<<<< HEAD
   
=======
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
 
>>>>>>> 3ad796ac2d54eef20d796a8111f1a3abfaf0a38d
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
