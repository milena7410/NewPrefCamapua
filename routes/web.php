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

Route::get('/', function () {
    return view('index');
})->name('inicio');


Route::get('/contato', function () {
    return view('contato');
})->name('contato');

//LOGIN
Route::get('/admin', 'Admin\UserAdminController@getLogin')->name('login');
Route::post('/logar', 'Admin\UserAdminController@postLogin');
Route::get('/sair', 'Auth\LoginController@logout')->name('logout');

//NOTICIA
Route::get('/noticia/{url}', 'NoticiaController@showByUrl')->name('noticia');
Route::get('/noticias', 'NoticiaController@index')->name('noticia.lista');
Route::get('/pesquisar', 'NoticiaController@search')->name('noticia.pesquisar');

//PAGINAS
Route::get('/paginas/{url}', 'PaginaController@show')->name('pagina.show');
Route::post('/contatar', 'PaginaController@contatar')->name('pagina.contatar');

//PUBLICACOES
Route::get('/publicacoes', 'PublicacaoController@index')->name('publicacao');
Route::get('/publicacoes-pesquisar', 'PublicacaoController@search')->name('publicacao.pesquisar');
Route::get('/publicacoes-tipo/{tipo}', 'PublicacaoController@findByNomeTipo')->name('publicacao.tipo');
Route::get('/publicacao/{url}', 'PublicacaoController@findPublicacaoByUrl')->name('publicacao.url');

//SECRETARIA
Route::get('/secretaria/{url}', 'SecretariaController@showByUrl')->name('secretaria');

//GALERIA
Route::get('/galerias', 'GaleriaController@index')->name('galeria');
Route::get('/galeria/{id}', 'GaleriaController@show')->name('galeria.show');


//PAINEL ADMINSITRATIVO
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    //ARQUIVO
    Route::get('/arquivos/{idPublicacao}', 'Admin\ArquivoAdminController@create')->name('arquivo.create');
    Route::post('/cadastrar-arquivo', 'Admin\ArquivoAdminController@store')->name('arquivo.store');
    Route::get('/mudar-status-arquivo/{id}/{status}',
        'Admin\ArquivoAdminController@changeStatus')->name('arquivo.changeStatus');
    Route::get('/remover-arquivo/{id}', 'Admin\ArquivoAdminController@remove')->name('arquivo.remove');

    Route::group(['as' => 'banner.'], function () {
        Route::get('/novo-banner', 'Admin\BannerAdminController@create')->name('create');
        Route::post('/novo-banner', 'Admin\BannerAdminController@store')->name('store');
        Route::get('/status-banner/{id?}/{status?}',
            'Admin\BannerAdminController@enableOrDisableCategory')->name('status');
        Route::get('/remover-banner/{id}', 'Admin\BannerAdminController@destroy')->name('destroy');
    });

    Route::group(['as' => 'cargo.'], function () {
        Route::get('/cargos', 'Admin\CargoAdminController@create')->name('create');
        Route::post('/cadastrar-cargo', 'Admin\CargoAdminController@store')->name('store');
        Route::get('/edicao-de-cargo/{id}', 'Admin\CargoAdminController@edit')->name('edit');
        Route::put('/editar-de-cargo/{id}', 'Admin\CargoAdminController@update')->name('update');
    });

    //CATEGORIA
    Route::get('/categorias', 'Admin\CategoriaAdminController@create')->name('categoria.create');
    Route::post('/cadastrar-categoria', 'Admin\CategoriaAdminController@store')->name('categoria.store');
    Route::get('/edicao-de-categoria/{id}', 'Admin\CategoriaAdminController@edit')->name('categoria.edit');
    Route::put('/editar-de-categoria/{id}', 'Admin\CategoriaAdminController@update')->name('categoria.update');


    Route::group(['as' => 'entidade.'], function () {
        Route::get('/dados-da-entidade/{id}', 'Admin\EntidadeAdminController@edit')->name('edit');
        Route::put('/dados-da-entidade/{id}', 'Admin\EntidadeAdminController@update')->name('update');
    });

    //FOTOS
    Route::get('/editar-fotos-galeria/{id}', 'Admin\FotoAdminController@images')->name('foto.edit');
    Route::post('/upload-foto-galeria', 'Admin\FotoAdminController@upload')->name('foto.upload');
    Route::post('/editar-imagens-galeria/{id}', 'Admin\FotoAdminController@updateImages')->name('foto.images');
    Route::get('/remove-foto-galeria/{id}', 'Admin\FotoAdminController@destroy')->name('foto.remove');
    Route::get('/define-foto-principal/{id}/{galeriaId}', 'Admin\FotoAdminController@definircapa')->name('foto.main');

    //GALERIA
    Route::get('/nova-galeria', 'Admin\GaleriaAdminController@create')->name('galeria.create');
    Route::post('/nova-galeria', 'Admin\GaleriaAdminController@store')->name('galeria.store');
    Route::get('/galerias', 'Admin\GaleriaAdminController@index')->name('galeria.index');
    Route::get('/galeria/{id}', 'Admin\GaleriaAdminController@edit')->name('galeria.edit');
    Route::put('/galeria/{id}', 'Admin\GaleriaAdminController@update')->name('galeria.update');


    //LINKS UTEIS
    Route::get('/novo-link', 'Admin\LinkAdminController@create')->name('link.create');
    Route::post('/nova-link', 'Admin\LinkAdminController@store')->name('link.store');
    Route::get('/links', 'Admin\LinkAdminController@index')->name('link.index');
    Route::get('/link/{id}', 'Admin\LinkAdminController@edit')->name('link.edit');
    Route::put('/link/{id}', 'Admin\LinkAdminController@update')->name('link.update');


    Route::group(['as' => 'midia.'], function () {
        Route::get('/midias', 'Admin\MidiaAdminController@create')->name('create');
        Route::post('/cadastrar-midia', 'Admin\MidiaAdminController@store')->name('store');
        Route::get('/mudar-status-midia/{id}/{status}',
            'Admin\MidiaAdminController@changeStatus')->name('changeStatus');
        Route::get('/remover-midia/{id}', 'Admin\MidiaAdminController@remove')->name('remove');
    });

    //NOTICIA
    Route::get('/nova-noticia', 'Admin\NoticiaAdminController@create')->name('noticia.create');
    Route::post('/nova-noticia', 'Admin\NoticiaAdminController@store')->name('noticia.store');
    Route::get('/noticias', 'Admin\NoticiaAdminController@index')->name('noticia.index');
    Route::get('/noticia/{id}', 'Admin\NoticiaAdminController@edit')->name('noticia.edit');
    Route::put('/noticia/{id}', 'Admin\NoticiaAdminController@update')->name('noticia.update');
    Route::get('/alterar-imagem-noticia/{id}', 'Admin\NoticiaAdminController@changePhoto')->name('noticia.changePhoto');
    Route::put('/alterar-imagem-noticia/{id}', 'Admin\NoticiaAdminController@updatePhoto')->name('noticia.updatePhoto');

    //SECRETARIA
    Route::get('/nova-secretaria', 'Admin\SecretariaAdminController@create')->name('secretaria.create');
    Route::post('/nova-secretaria', 'Admin\SecretariaAdminController@store')->name('secretaria.store');
    Route::get('/secretarias', 'Admin\SecretariaAdminController@index')->name('secretaria.index');
    Route::get('/secretaria/{id}', 'Admin\SecretariaAdminController@edit')->name('secretaria.edit');
    Route::put('/secretaria/{id}', 'Admin\SecretariaAdminController@update')->name('secretaria.update');

    //SECRETARIO
    Route::get('/novo-secretario', 'Admin\SecretarioAdminController@create')->name('secretario.create');
    Route::post('/novo-secretario', 'Admin\SecretarioAdminController@store')->name('secretario.store');
    Route::get('/secretarios', 'Admin\SecretarioAdminController@index')->name('secretario.index');
    Route::get('/secretario/{id}', 'Admin\SecretarioAdminController@edit')->name('secretario.edit');
    Route::put('/secretario/{id}', 'Admin\SecretarioAdminController@update')->name('secretario.update');
    Route::get('/alterar-imagem-secretario/{id}',
        'Admin\SecretarioAdminController@changePhoto')->name('secretario.changePhoto');
    Route::put('/alterar-imagem-secretario/{id}',
        'Admin\SecretarioAdminController@updatePhoto')->name('secretario.updatePhoto');

    Route::group(['as' => 'site.'], function () {
        Route::get('/configuracaoes-site/{id}', 'Admin\SiteAdminController@edit')->name('edit');
        Route::put('/configuracaoes-site/{id}', 'Admin\SiteAdminController@update')->name('update');
    });

    //SLIDER
    Route::group(['as' => 'banner.'], function () {
        Route::get('/novo-banner', 'Admin\BannerAdminController@create')->name('create');
        Route::post('/novo-banner', 'Admin\BannerAdminController@store')->name('store');
        Route::get('/status-banner/{id}/{status}',
            'Admin\BannerAdminController@enableOrDisableCategory')->name('status');
        Route::get('/remover-banner/{id}', 'Admin\BannerAdminController@destroy')->name('destroy');
    });

    //PAGINAS
    Route::get('/paginas-institucionais', 'Admin\PaginaAdminController@showAll')->name('pagina.showAll');
    Route::get('/nova-pagina', 'Admin\PaginaAdminController@create')->name('pagina.create');
    Route::post('/criar-nova-pagina', 'Admin\PaginaAdminController@store')->name('pagina.store');
    Route::get('/alterar-pagina/{id}', 'Admin\PaginaAdminController@edit')->name('pagina.edit');
    Route::put('/editar-pagina/{id}', 'Admin\PaginaAdminController@update')->name('pagina.update');

    //PUBLICACAO
    Route::get('/nova-publicacao', 'Admin\PublicacaoAdminController@create')->name('publicacao.create');
    Route::post('/nova-publicacao', 'Admin\PublicacaoAdminController@store')->name('publicacao.store');
    Route::get('/publicacoes', 'Admin\PublicacaoAdminController@index')->name('publicacao.index');
    Route::get('/publicacao/{id}', 'Admin\PublicacaoAdminController@edit')->name('publicacao.edit');
    Route::put('/publicacao/{id}', 'Admin\PublicacaoAdminController@update')->name('publicacao.update');

    Route::group(['as' => 'tipo.'], function () {
        Route::get('/tipo-publicacao', 'Admin\TipoPublicacaoAdminController@create')->name('create');
        Route::post('/cadastrar-tipo-publicacao', 'Admin\TipoPublicacaoAdminController@store')->name('store');
        Route::get('/edicao-de-tipo-publicacao/{id}', 'Admin\TipoPublicacaoAdminController@edit')->name('edit');
        Route::put('/editar-de-tipo-publicacao/{id}', 'Admin\TipoPublicacaoAdminController@update')->name('update');
        Route::get('/editar-status-de-tipo-publicacao/{id}/{status}',
            'Admin\TipoPublicacaoAdminController@enableOrDisable')->name('changeStatus');
    });

    Route::group(['as' => 'subtipo.'], function () {
        Route::get('/subtipo-publicacao/{id}', 'Admin\TipoPublicacaoAdminController@createSubtipo')->name('create');
    });

    //USUARIOS
    Route::get('/novo-usuario', ['as' => 'user.create', 'uses' => 'Admin\UserAdminController@create']);
    Route::post('/novo-usuario', ['as' => 'user.store', 'uses' => 'Admin\UserAdminController@store']);
    Route::get('/usuarios', ['as' => 'user.list', 'uses' => 'Admin\UserAdminController@show']);
    Route::get('/editar-usuario/{id}', ['as' => 'user.edit', 'uses' => 'Admin\UserAdminController@edit']);
    Route::post('/editar-usuario/{id}', ['as' => 'user.update', 'uses' => 'Admin\UserAdminController@update']);
    Route::get('/meus-dados', ['as' => 'user.myData', 'uses' => 'Admin\UserAdminController@myData']);
    Route::get('/mudar-senha', ['as' => 'user.changePassword', 'uses' => 'Admin\UserAdminController@changePassword']);
    Route::post('/mudar-senha', ['as' => 'user.updatePassword', 'uses' => 'Admin\UserAdminController@updatePassword']);
});
