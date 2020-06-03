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

Auth::routes();

Route::get('/', 'HomeController@pre_index');
Route::get('/home', 'HomeController@pre_index');
Route::get('/icons', 'HomeController@icon')->name('icons');
Route::get('/teste', 'HomeController@teste')->name('teste');
Route::get('/welcome', 'HomeController@teste')->name('welcome');

Route::any('/welcome', function () {
	
	return view('welcome');
});

Route::any('test', function () {

    event(new SEO\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});


Route::any('/home', 'HomeController@index')->name('home');
Route::any('/pre_home', 'HomeController@pre_index')->name('pre_home');
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');




Route::get('alterar-usuario', 'UserController@index');
Route::post('alterar-senha', 'UserController@updatePassword')->name('alterar-senha');
Route::post('alterar-secretaria', 'UserController@updateSecretaria')->name('alterar-secretaria');

/*Rotas Natureza de Despesa*/
Route::middleware(['auth'])->group(function () {
    Route::get('natureza-de-despesa/index', 'NaturezaDeDespesaController@index', function () {});
    Route::any('natureza-de-despesa/cadastrar', 'NaturezaDeDespesaController@cadastrar', function () {})->name('cadastrarNaturezaDeDespesa');
	Route::post('natureza-de-despesa/inserir', 'NaturezaDeDespesaController@create', function () {})->name('inserirNaturezaDeDespesa');
	Route::any('natureza-de-despesa/show', 'NaturezaDeDespesaController@show', function () {})->name('showNaturezaDeDespesa');
	Route::any('importar', 'NaturezaDeDespesaController@importar', function () {})->name('importarNaturezaDeDespesa');
});

/*Rotas Unidade Orçamentária*/
Route::middleware(['auth'])->group(function () {
    Route::get('unidade-orcamentaria/index', 'UnidadeOrcamentariaController@index', function () {});
    Route::get('unidade-orcamentaria/cadastrar', 'UnidadeOrcamentariaController@cadastrar', function () {})->name('cadastrarUnidadeOrcamentaria');
	Route::post('unidade-orcamentaria/inserir', 'UnidadeOrcamentariaController@create', function () {})->name('inserirUnidadeOrcamentaria');
	Route::any('unidade-orcamentaria/show', 'UnidadeOrcamentariaController@show', function () {})->name('showUnidadeOrcamentaria');
	Route::any('unidade-orcamentaria/importar', 'UnidadeOrcamentariaController@importar', function () {})->name('importarUnidadeOrcamentaria');
});

/*Rotas Unidade Executora*/
Route::middleware(['auth'])->group(function () {
    Route::get('unidade-executora/index', 'UnidadeExecutoraController@index', function () {});
    Route::get('unidade-executora/cadastrar', 'UnidadeExecutoraController@cadastrar', function () {})->name('cadastrarUnidadeExecutora');
	Route::post('unidade-executora/inserir', 'UnidadeExecutoraController@create', function () {})->name('inserirUnidadeExecutora');
	Route::any('unidade-executora/show', 'UnidadeExecutoraController@show', function () {})->name('showUnidadeExecutora');
	Route::any('unidade-executora/importar', 'UnidadeExecutoraController@importar', function () {})->name('importarUnidadeExecutora');
});

/*Rotas Vínculos*/
Route::middleware(['auth'])->group(function () {
    Route::get('vinculos/index', 'VinculosController@index', function () {});
    Route::get('vinculos/cadastrar', 'VinculosController@cadastrar', function () {})->name('cadastrarVinculos');
	Route::post('vinculos/inserir', 'VinculosController@create', function () {})->name('inserirVinculos');
	Route::any('vinculos/show', 'VinculosController@show', function () {})->name('showVinculos');
	Route::any('vinculos/importar', 'VinculosController@importar', function () {})->name('importarVinculos');
});

/*Rotas Classificacao Funcional Programatica*/
Route::middleware(['auth'])->group(function () {
    Route::get('classificacao-funcional-programatica/index', 'ClassificacaoFuncionalProgramaticaController@index', function () {});
    Route::get('classificacao-funcional-programatica/cadastrar', 'ClassificacaoFuncionalProgramaticaController@cadastrar', function () {})->name('cadastrarClassificacaoFuncionalProgramatica');
	Route::post('classificacao-funcional-programatica/inserir', 'ClassificacaoFuncionalProgramaticaController@create', function () {})->name('inserirClassificacaoFuncionalProgramatica');
	Route::any('classificacao-funcional-programatica/show', 'ClassificacaoFuncionalProgramaticaController@show', function () {})->name('showClassificacaoFuncionalProgramatica');
	Route::any('classificacao-funcional-programatica/importar', 'ClassificacaoFuncionalProgramaticaController@importar', function () {})->name('importarClassificacaoFuncionalProgramatica');
});

/*Rotas Dotação Orçamentária*/
Route::middleware(['auth'])->group(function () {
    Route::get('dotacao-orcamentaria/index', 'DotacaoOrcamentariaController@index', function () {});
	Route::any('dotacao-orcamentaria/cadastrar', 'DotacaoOrcamentariaController@cadastrar', function () {})->name('cadastrarDotacaoOrcamentaria');
	Route::post('dotacao-orcamentaria/inserir', 'DotacaoOrcamentariaController@create', function () {})->name('inserirDotacaoOrcamentaria');
	Route::any('dotacao-orcamentaria/show', 'DotacaoOrcamentariaController@show', function () {})->name('showDotacaoOrcamentaria');
	Route::any('dotacao-orcamentaria/implementar', 'DotacaoOrcamentariaController@implementar', function () {})->name('implementarDotacaoOrcamentaria');
	Route::post('dotacao-orcamentaria/alterar', 'DotacaoOrcamentariaController@update', function () {})->name('alterarDotacaoOrcamentaria');
	Route::any('dotacao-orcamentaria/importar', 'DotacaoOrcamentariaController@importar', function () {})->name('importarAtualizarDotacaoOrcamentaria');
});

//Rotas Contabilidade
Route::middleware(['auth'])->group(function () {
    Route::get('contabilidade/formularios', 'ContabilidadeController@formularios', function () {})->name('contabilidade_formularios');
	Route::get('contabilidade/leis_decretos', 'ContabilidadeController@leis_decretos', function () {})->name('contabilidade_leis_decretos');
});

//Rotas Orcamento
Route::middleware(['auth'])->group(function () {
    Route::any('orcamento/formularios', 'OrcamentoController@formularios', function () {})->name('orcamento_formularios');
	Route::get('orcamento/manual', 'OrcamentoController@manual', function () {})->name('orcamento_manual');
	Route::any('orcamento/leis_decretos', 'OrcamentoController@leis_decretos', function () {})->name('orcamento_leis_decretos');
	Route::any('orcamento/contratos', 'OrcamentoController@contratos', function () {})->name('orcamento_contratos');
	Route::get('orcamento/saldo_dotacoes', 'OrcamentoController@saldo_dotacoes', function () {})->name('orcamento_saldo_dotacoes');
	Route::get('orcamento/agenda_orcamentaria', 'OrcamentoController@agenda_orcamentaria', function () {})->name('orcamento_agenda_orcamentaria');
	Route::any('orcamento/show', 'OrcamentoController@show', function () {})->name('orcamento_show');
	Route::any('orcamento/criar_pdf', 'OrcamentoController@criar_pdf', function () {})->name('orcamento_criar_pdf');
	
	//Route::any('orcamento/formularios/credito_adicional_suplementar', 'OrcamentoController@formularios', function () {})->name('orcamento_formularios');
});

//Rotas Comitê Gestor
Route::middleware(['auth'])->group(function () {
    Route::get('comite-gestor/index', 'ComiteGestorController@index', function () {})->name('comite_gestor');
});

//Rotas Informações
Route::middleware(['auth'])->group(function () {
	Route::any('informacao/index', 'InformacaoController@index', function () {})->name('indexInformacao');
	Route::any('informacao/cadastrar', 'InformacaoController@create', function () {})->name('createInformacao');
	Route::any('informacao/store', 'InformacaoController@store', function () {})->name('criarInformacao');
	Route::get('informacao/show', 'InformacaoController@show', function () {})->name('showInformacao');
	Route::any('informacao/remover', 'InformacaoController@destroy', function () {})->name('removerInformacao');
});

//chamar o método do controller User
Route::get('show','UserController@show')->name('show')->middleware('admin');
Route::any('update','UserController@update')->name('atualizarUsuario')->middleware('admin');;

//Rotas chat
Route::get('/load-latest-messages', 'MessagesController@getLoadLatestMessages');
Route::post('/send', 'MessagesController@postSendMessage');
Route::get('/fetch-old-messages', 'MessagesController@getOldMessages');
Route::post('/status_message', 'MessagesController@status_message')->name('status_message');
