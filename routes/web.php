<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\CursosController;
use \App\Http\Controllers\ProdutosController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\InfoPageController;
use \Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use \App\Models\Cursos;
use \App\Models\Produtos;
use \App\Models\Info_Page;

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
    $cursos = Cursos::where('status_db', 1)->where('status', 1)->get();
    $produtos = Produtos::where('status_db', 1)->where('status', 1)->get();
    $info_pages = Info_Page::get()->first();
    return view('site.index', compact('produtos', 'cursos', 'info_pages'));
})->name('home');

Route::post('envia-contato', function (Request $request) {
    $mail = new stdClass();
    $mail->nome = $request->nome;
    $mail->email = $request->email;
    $mail->assunto = $request->assunto;
    $mail->mensagem = $request->mensagem;
    $mail->nome = 'Cristian';
    $mail->email = 'juniorgamer2209@gmail.com';
    $mail->assunto = 'Teste';
    $mail->mensagem = 'Aaaaaaaaaaa';
    //return new \App\Mail\contatoSite($mail);
    Mail::send(new \App\Mail\contatoSite($mail));
    return json_encode(['status'=>true]);
})->name('contatoMail');

Auth::routes();
Route::get('/logout1', [LoginController::class, 'logout'])->name('logout1');
Route::group([
    'middleware' => ['auth'],
], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.home');
        Route::put('/info_pages/{info_Page}', [InfoPageController::class, 'update'])->name('admin.info.update');
        Route::get('/perfil', [UserController::class, 'index'])->name('admin.profile');
        Route::put('/perfil/{user}/update', [UserController::class, 'update'])->name('admin.profile.update');
        Route::group(['prefix' => 'cursos'], function () {
            Route::get('/', [CursosController::class, 'index'])->name('admin.cursos.index');
            Route::post('/datatable', [CursosController::class, 'datatable'])->name('admin.cursos.datatable');
            Route::get('/novo', [CursosController::class, 'create'])->name('admin.cursos.create');
            Route::post('/store', [CursosController::class, 'store'])->name('admin.cursos.store');
            Route::get('/{cursos}/editar', [CursosController::class, 'edit'])->name('admin.cursos.edit');
            Route::put('/{cursos}/update', [CursosController::class, 'update'])->name('admin.cursos.update');
            Route::delete('/{cursos}/destroy', [CursosController::class, 'destroy'])->name('admin.cursos.destroy');
        });
        Route::group(['prefix' => 'produtos'], function () {
            Route::get('/', [ProdutosController::class, 'index'])->name('admin.produtos.index');
            Route::post('/datatable', [ProdutosController::class, 'datatable'])->name('admin.produtos.datatable');
            Route::get('/novo', [ProdutosController::class, 'create'])->name('admin.produtos.create');
            Route::post('/store', [ProdutosController::class, 'store'])->name('admin.produtos.store');
            Route::get('/{produtos}/editar', [ProdutosController::class, 'edit'])->name('admin.produtos.edit');
            Route::put('/{produtos}/update', [ProdutosController::class, 'update'])->name('admin.produtos.update');
            Route::delete('/{produtos}/destroy',
                [ProdutosController::class, 'destroy'])->name('admin.produtos.destroy');
        });
    });
});
