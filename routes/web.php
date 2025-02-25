<?php

use App\Models\Card;
use App\Models\User;
use App\Models\Municipio;
use App\Models\Provincia;
use App\Http\Controllers\SolicitarController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\SolicitacaoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AberturaController;
use App\Models\Abertura;
use App\Http\Controllers\cartaolistController;
use GuzzleHttp\Promise\Create;

//use App\Http\Controllers\ContaController;


/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
*/


// Página inicial chamando website.blade.php
Route::get('/', function () {
    return view('auth.website'); // Certifique-se de ter o arquivo resources/views/website.blade.php
})->name('home');

// Rota de login continua separada
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/explore', function () {
    return view('auth.explore');
})->name('explore');

// Redirecionamentos iniciais

Route::get('/register', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user && $user->accessId == 1) {
        // Redireciona para a rota de administrador
        return redirect()->route('dashboard.home');
    } elseif ($user && $user->accessId == 2) {
        return redirect()->route('user.perfile'); // Cliente
    }


    // Caso não haja nenhum accessId válido ou o usuário não esteja autenticado

    return redirect()->route('login');
});


// Admin routes


    // Rotas para Cartões
    Route::prefix('pedidos')->group(function () {
        Route::get('/cartoes/list', [CardController::class, 'index'])->name('dashboard.index');
        Route::post('/cartoes', [CardController::class, 'store'])->name('dashboard.store');
        Route::get('/cartoes/create', [CardController::class, 'create'])->name('dashboard.create');
        Route::get('cartoes/sow/{id}', [CardController::class, 'show'])->name('dashboard.show');
        Route::get('/cartoes/edit/{id}', [CardController::class, 'edit'])->name('cards.edit');
        Route::put('cartoes/update/{id}', [CardController::class, 'update'])->name('cards.update');
        Route::delete('/cartoes/destroy/{id}', [CardController::class, 'destroy'])->name('cards.destroy');
        Route::get('/cartoes/PDF', [Cardcontroller::class, 'gerarPdf'])->name('cartao.PDF');
        Route::get('/cartaolist/pdf', [cartaolistController::class, 'generatePDF'])->name('cartaolist.PDF');


    });


    // Perfil e Registro de Usuários
    Route::get('/profile', [CardController::class, 'profile'])->name('dashboard.profile');
    Route::get('/home', [CardController::class, 'home'])->name('dashboard.home');
    Route::prefix('register')->group(function () {
        Route::get('create', [UserController::class, 'create'])->name('dashboard.register.user.index');
        Route::post('/', [UserController::class, 'store'])->name('dashboard.register.user.store');
    });

    // Listagem e Pedidos, c
    Route::prefix('listar')->group(function () {
        Route::get('cliente', [ClienteController::class, 'index'])->name('dashboard.listar.cliente');
        Route::get('/cliente/PDF', [ClienteController::class, 'gerarPdf'])->name('cliente.PDF');
        Route::delete('cliente/{id}', [ClienteController::class, 'destroy'])->name('dashboard.listar.cliente.destroy');
        Route::get('visa', [CardController::class, 'visa'])->name('visa.index');
        Route::get('cartoes', [CardController::class, 'lista'])->name('dashboard.listar.card');
        Route::put('/cliente/update/{id}', [ClienteController::class, 'update'])->name('user.update');
    });

    Route::prefix('pedidos')->group(function () {
            Route::get('/solicitacao/list', [SolicitarController::class, 'index'])->name('solicitacao.list');
            Route::post('/solicitacao', [SolicitarController::class, 'store'])->name('solicitacao.store');
            Route::get('/solicitacao/create', [SolicitarController::class, 'create'])->name('solicitacao.create');
            Route::get('/solicitacao/show/{id}', [SolicitarController::class, 'show'])->name('solicitacao.show');
            Route::put('/solicitacao/update/{id}', [SolicitarController::class, 'update'])->name('solicitacao.update');
            Route::get('/solicitacao/edit/{id}', [SolicitarController::class, 'edit'])->name('solicitacao.edit');
            Route::delete('/solicitacao/destroy/{id}', [SolicitarController::class, 'destroy'])->name('solicitacao.destroy');
            Route::get('/solicitacao/PDF', [SolicitarController::class, 'gerarPdf'])->name('solicitacao.PDF');

        });
  /*   Route::get('/admin/classe/list', ['as' => 'admin.classe.list', 'uses' => 'Admin\ClasseController@index']);
    Route::post('/admin/classe', ['as' => 'admin.classe.store', 'uses' => 'Admin\ClasseController@store']);
    Route::get('/admin/classe/create', ['as' => 'admin.classe.create', 'uses' => 'Admin\ClasseController@create']);
    Route::get('/admin/classe/show/{id}', ['as' => 'admin.classe.show', 'uses' => 'Admin\ClasseController@show']);
    Route::post('/admin/classe/update/{id}', ['as' => 'admin.classe.update', 'uses' => 'Admin\ClasseController@update']);
    Route::delete('/admin/classe/destroy/{id}', ['as' => 'admin.classe.destroy', 'uses' => 'Admin\ClasseController@destroy']);
    Route::get('/admin/classe/edit/{id}', ['as' => 'admin.classe.edit', 'uses' => 'Admin\ClasseController@edit']);
 */

    // Pedidos de Usuários
    /* pedidos/users/${id}/edit */

    /* Route::put('pedidos/solicitacao/update/{id}', [SolicitarController::class, 'update'])->name('solicitacao.update'); */
    // Rota para exibir o formulário de abertura
    Route::get('/abertura', [AberturaController::class, 'create'])->name('abertura.create');  // Rota para o formulário
    Route::post('/abertura', [AberturaController::class, 'store'])->name('abertura.store');   // Rota para salvar os dados
    Route::get('/aberturas', [AberturaController::class, 'index'])->name('abertura.index');   // Rota para listar as contas
    Route::get('/abertura/{id}', [AberturaController::class, 'show'])->name('abertura.show');   // Rota para mostrar os detalhes da conta

    // Rota para exibir o formulário de abertura
     Route::prefix('aberturas')->group(function(){
        Route::get('aberturas', [AberturaController::class, 'index'])->name('aberturas.index');
        Route::get('aberturas/create', [AberturaController::class, 'create'])->name('aberturas.create');
        Route::post('aberturas', [AberturaController::class, 'store'])->name('aberturas.store');
        Route::get('aberturas/{id}', [AberturaController::class, 'show'])->name('aberturas.show');
        Route::get('aberturas/{id}/edit', [AberturaController::class, 'edit'])->name('aberturas.edit');
        Route::put('aberturas/{id}', [AberturaController::class, 'update'])->name('aberturas.update');
        Route::delete('aberturas/{id}', [AberturaController::class, 'destroy'])->name('aberturas.destroy');
        Route::delete('aberturas/PFD', [AberturaController::class, 'gerarpdf'])->name('aberturas.PDF');


        });


    // Rota para processar o envio do formulário de abertura
    Route::post('/abertura', [AberturaController::class, 'submitForm'])->name('abertura.submit');

        // Gerar QR Code para cartão

        Route::get('qrcode/{id?}', function ($id = null) {
            if ($id === null) {
                return redirect()->route('dashboard.profile');
            }

            $card = Card::findOrFail($id);
            $provincia = Provincia::findOrFail($card->provinciaID);
            $municipio = Municipio::findOrFail($card->municipioID);

            $cardInfo = "Número do Cartão: {$card->cardNumber}\n";
            $cardInfo .= "Titular: {$card->cardHolder}\n";
            $cardInfo .= "Validade: {$card->expirationMonth}/{$card->expirationYear}\n";
            $cardInfo .= "Tipo: {$card->type}\n";
            $cardInfo .= "Status: {$card->status}\n";
            $cardInfo .= "Província: {$provincia->name}\n";
            $cardInfo .= "Município: {$municipio->name}\n";
            $cardInfo .= "País: {$card->pais}\n";

            return QrCode::size(200)
                ->backgroundColor(220, 240, 255)
                ->generate($cardInfo);
        })->name('qrcode');



// Logout
Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');


// User routes
Route::prefix('users')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/register', function () {
        $provincias = Provincia::all();
        $municipios = Municipio::all();
        return view('users.register', compact('provincias', 'municipios'));
    })->name('users');

    Route::prefix('dashboard')->group(function () {
        Route::get('/perfil', [ClienteController::class, 'profile'])->name('user.perfile');
        Route::get('/contas', [ClienteController::class, 'contas'])->name('contas.index');
        Route::get('/solicitar', [SolicitarController::class, 'index'])->name('solicitar.index');
        Route::post('/solicitar', [SolicitacaoController::class, 'store'])->name('solicitar.store');
        Route::delete('/solicitar/{id}', [SolicitarController::class, 'destroy'])->name('solicitar.destroy');
        Route::delete('/cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
        Route::get('/listar', [CardController::class, 'listar'])->name('user.cartao');
    });

    // Rota para envio de e-mail
    /* Route::get('/enviar-email', function () {
        return view('solicitar');
    }); */

    /* Route::post('/enviar-email', [SolicitacaoController::class, 'store'])->name('solicitar.store'); */
});
