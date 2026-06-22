<?php

use App\Http\Controllers\{PageController, AvaliacaoController};
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\{DashboardController, PostController, TestimonialController, LeadController};
use Illuminate\Support\Facades\Route;

/* ---------- Site público ---------- */
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/quem-somos', [PageController::class, 'quemSomos'])->name('quem-somos');
Route::get('/servicos', [PageController::class, 'servicos'])->name('servicos');
Route::get('/saude-da-mulher', [PageController::class, 'mulher'])->name('mulher');
Route::get('/saude-da-mulher/sexualidade', [PageController::class, 'sexualidade'])->name('sexualidade');

// Páginas de tópico (config/site.php -> topicos). Caminho = chave.
foreach (array_keys(config('site.topicos')) as $slug) {
    Route::get('/'.$slug, [PageController::class, 'topico'])->name('topico.'.str_replace('/', '.', $slug));
}

Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{post:slug}', [PageController::class, 'post'])->name('post');
Route::get('/contato', [PageController::class, 'contato'])->name('contato');

/* ---------- Avaliação online (1 por e-mail) ---------- */
Route::post('/avaliacao', [AvaliacaoController::class, 'store'])->middleware('throttle:15,1')->name('avaliacao.store');

/* ---------- Autenticação ---------- */
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* ---------- Painel ---------- */
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class)->except(['show']);
    Route::resource('testimonials', TestimonialController::class)->except(['show'])->parameters(['testimonials' => 'testimonial']);
    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::get('/conta', [\App\Http\Controllers\Admin\AccountController::class, 'editPassword'])->name('account.password');
    Route::put('/conta/senha', [\App\Http\Controllers\Admin\AccountController::class, 'updatePassword'])->name('account.password.update');
    Route::resource('usuarios', \App\Http\Controllers\Admin\UserController::class)->except(['show'])->parameters(['usuarios' => 'user']);
});
