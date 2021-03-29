<?php

use Illuminate\Support\Facades\Route;

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

Route::any('/', 'IndexController@index');
Route::get('/pos-login', 'IndexController@posLogin')->name('pos-login');
Route::get('/do-forget/{email}', 'IndexController@forget')->name('forget');

Route::group(['as' => 'web.', 'middleware' => 'auth:web', "prefix" => "{contaId}"], function () {
    Route::get('/', 'IndexController@index')->name('home');
    Route::get('/quick-search', 'IndexController@search')->name('quick-search');
    Route::get('/settings', 'IndexController@settings')->name('settings');

    // Rotas para pessoa
    Route::resource('pessoa', 'PessoaController')->except('show');
    Route::get('pessoa-data', 'PessoaController@datatable')->name('pessoa.datatable');
    Route::get('/pessoa/find', 'PessoaController@find')->name('pessoa.findView');
    Route::post('/pessoa/find', 'PessoaController@doFind')->name('pessoa.findForm');

    // Rotas para cidade
    Route::get('/cidade/find', 'CidadeController@find')->name('cidade.find');

    // Rotas para pessoa telefone
    Route::resource('pessoa/{pessoa}/pessoa-telefone', 'PessoaTelefoneController')->except('show');

    // Rotas para pessoa endereço
    Route::resource('pessoa/{pessoa}/pessoa-endereco', 'PessoaEnderecoController')->except('show');
    Route::get('/pessoa/{pessoa}/pessoa-endereco/find', 'PessoaEnderecoController@find')->name('pessoa-endereco.findViewCEP');
    Route::post('/pessoa/{pessoa}/pessoa-endereco/find', 'PessoaEnderecoController@doFind')->name('pessoa-endereco.findCEP');

    //Rotas de relatório
    Route::get('relatorio-usuario-acesso', 'RelatorioController@usuarioAcesso')->name('relatorio-usuario-acesso');
    Route::get('relatorio-usuario-acesso-data', 'RelatorioController@usuarioAcessoData')->name('relatorio-usuario-acesso.data');

    //Rotas para Aceite AplicativoPolitica
    Route::post('aplicativo/aplicativo-politica',
        'AplicativoPoliticaAceiteUsuarioController@store')
        ->name('politica-aceite-usuario.store');

    //Rotas para Webhook
    Route::resource('webhook', 'WebhookController');
    Route::get('webhook/{webhook}/teste', 'WebhookController@teste')->name('webhook.teste');
    Route::get('webhook-data', 'WebhookController@datatable')->name('webhook.datatable');
});

