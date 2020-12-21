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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
});

Route::get('enviararquivo', function () {
    return view('enviararquivo');
})->name('enviararquivo');

Route::resource('arquivos', App\Http\Controllers\ArquivoController::class);






Route::resource('contatos', App\Http\Controllers\ContatosController::class);

Route::resource('producoes', App\Http\Controllers\ProducoesController::class);
Route::post('enviarPaginaDeTeste/{id}', [App\Http\Controllers\ProducoesController::class, 'enviarPaginaDeTeste'])->name('enviarPaginaDeTeste');

Route::resource('imagens', App\Http\Controllers\ImagensController::class);

Route::post('envieEmail', [App\Http\Controllers\EmailController::class, 'envieEmail'])->name('envieEmail');
Route::post('testePelotao', [App\Http\Controllers\EmailController::class, 'testePelotao'])->name('testePelotao');
Route::post('enviarProducaoTeste', [App\Http\Controllers\EmailController::class, 'enviarProducaoTeste'])->name('enviarProducaoTeste');
Route::post('enviarProducao', [App\Http\Controllers\EmailController::class, 'enviarProducao'])->name('enviarProducao');

/*
Route::get('/quem_somos', function () {
    return view('quem_somos');
})->name('quem_somos');

Route::get('/contato', function () {
    return view('contato');
})->name('contato');

Route::get('/termos_e_condicoes', function () {
    return view('termos_e_condicoes');
})->name('termos_e_condicoes');

Route::get('/formas_de_envios', function () {
    return view('formas_de_envios');
})->name('formas_de_envios');

Route::get('/trocas_e_devolucoes', function () {
    return view('trocas_e_devolucoes');
})->name('trocas_e_devolucoes');

Route::get('/formas_de_pagamento', function () {
    return view('formas_de_pagamento');
})->name('formas_de_pagamento');

Route::get('/minha_conta', function () {
    return view('minha_conta');
})->name('minha_conta');

Route::get('/meus_pedidos', function () {
    return view('meus_pedidos');
})->name('meus_pedidos');

Route::get('/meus_bilhetes', function () {
    return view('meus_bilhetes');
})->name('meus_bilhetes');

Route::get('/sorteios', function () {
    return view('sorteios');
})->name('sorteios');

Route::get('/sorteios_selecionar_numero', function () {
    return view('sorteios_selecionar_numero');
})->name('sorteios_selecionar_numero');





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('site', App\Http\Controllers\SiteController::class);
Route::get('/verTemplateEmail', function () {
    return view('emails.homeCP2');
})
->middleware('can:admin')->name('verTemplateEmail');



Route::resource('produto', App\Http\Controllers\ProdutoController::class)->middleware('can:admin');
Route::get('/produtos', function () {
    return view('produtoLista');
})->name('produtos');
Route::get('/verproduto/{id}/', [App\Http\Controllers\ProdutoController::class, 'verproduto'])->name('verproduto');
Route::get('/versorteio/{id}/', [App\Http\Controllers\ProdutoController::class, 'versorteio'])->name('versorteio');
Route::put('/definirImagemPrincipal', [App\Http\Controllers\ProdutoController::class, 'definirImagemPrincipal'])
    ->name('definirImagemPrincipal')
    ->middleware('can:admin');
Route::delete('/excluirImagem', [App\Http\Controllers\ProdutoController::class, 'excluirImagem'])
    ->name('excluirImagem')
    ->middleware('can:admin');
Route::post('/addItemNocarrinho', [App\Http\Controllers\ProdutoController::class, 'addItemNocarrinho'])->name('addItemNocarrinho');
Route::get('/limparCarinhoTotal', [App\Http\Controllers\ProdutoController::class, 'limparCarinhoTotal'])->name('limparCarinhoTotal');
Route::get('/showCarrinho', [App\Http\Controllers\ProdutoController::class, 'showCarrinho'])->name('showCarrinho');
Route::get('/removerItemCarrinho/{id}/', [App\Http\Controllers\ProdutoController::class, 'removerItemCarrinho'])->name('removerItemCarrinho');

Route::resource('depoimento', App\Http\Controllers\DepoimentosController::class)->middleware('can:admin');
Route::get('/depoimentos', function () {
    return view('depoimentosLista');
})->name('depoimentos');
Route::delete('/excluirDEP', [App\Http\Controllers\DepoimentosController::class, 'excluirDEP'])
    ->name('excluirDEP')
    ->middleware('can:admin');

Route::resource('duvidasfrequentes', App\Http\Controllers\DuvidasfrequentesController::class)->middleware('can:admin');
Route::delete('/excluirDF', [App\Http\Controllers\DuvidasfrequentesController::class, 'excluirDF'])
    ->name('excluirDF')
    ->middleware('can:admin');

Route::post('/envieEmail', [App\Http\Controllers\SiteController::class, 'envieEmail'])->name('envieEmail');
Route::post('/aceitarTermos', [App\Http\Controllers\SiteController::class, 'aceitarTermos'])->name('aceitarTermos');
Route::get('/testeEmail', [App\Http\Controllers\SiteController::class, 'testeEmail'])->name('testeEmail');
*/
