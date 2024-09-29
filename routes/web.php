<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\ChamadaController;

Route::get('/', [TurmaController::class, 'index'])->name('home');

Route::resource('alunos', AlunoController::class);
Route::resource('turmas', TurmaController::class);
Route::resource('matriculas', MatriculaController::class);

Route::get('turmas/{id}/relatorio-chamadas', [MatriculaController::class, 'relatorioChamadas'])->name('chamada.relatorio');

Route::get('/turma/{id_turma}/historico-chamadas', [ChamadaController::class, 'historico'])->name('chamada.historico');
Route::post('/turma/chamada/salvar', [ChamadaController::class, 'store'])->name('chamada.store');

Route::get('/csrf-token', function () {
    return ['csrf_token' => csrf_token()];
});

Route::get('/session-test', function () {
    session(['key' => 'value']);
    return session('key');
});
