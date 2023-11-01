<?php

use App\Http\Controllers\{
    CompanyController,
    CurriculoController,
    FreelaController,
    InviteController,
    ProfileController,
    StarRatingController
};
use App\Http\Livewire\{
    Company\Company as CompanyCompany,
    PersonalData,
};

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('livewire.welcome');
});

/* Routes Curriculo */

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [CurriculoController::class, 'index'])->name('dashboard');
    Route::get('/cadastrarCurriculo', [CurriculoController::class, 'create'])->name('curriculo.create');
    Route::post('/curriculo', [CurriculoController::class, 'store'])->name('curriculo.store');
    Route::get('/curriculo', [CurriculoController::class, 'edit'])->name('curriculo.edit');
    Route::patch('/curriculo', [CurriculoController::class, 'update'])->name('curriculo.update');
    Route::delete('/curriculo', [CurriculoController::class, 'destroy'])->name('curriculo.destroy');
    Route::post('/photoUser', [PersonalData::class, 'storagePhoto'])->name('photoUser.storagePhoto');
});

/* Routes Profile */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Routes Company */

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [CompanyCompany::class, 'index'])->name('dashboard');
    Route::get('/cadastrarEmpresa', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/empresa', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/empresa', [CompanyController::class, 'edit'])->name('company.edit');
    Route::patch('/empresa', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/empresa', [CompanyController::class, 'destroy'])->name('company.destroy');
});

/* Routes Freelance */

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [FreelaController::class, 'index'])->name('dashboard');
    Route::get('/cadastrarFreela', [FreelaController::class, 'create'])->name('freela.create');
    Route::post('/freela', [FreelaController::class, 'store'])->name('freela.store');
    Route::get('/freela/{id}', [FreelaController::class, 'edit'])->name('freela.edit');
    Route::patch('/freela/{id}', [FreelaController::class, 'update'])->name('freela.update');
    Route::post('/dashboard', [FreelaController::class, 'searchFreelancer'])->name('freela.search');
    Route::delete('/freela/{id}', [FreelaController::class, 'destroy'])->name('freela.destroy');
});

/* Routes Invite */

Route::middleware('auth')->group(function () {

    Route::get('/dashboard0', [InviteController::class, 'create'])->name('dashboard');
    Route::get('/convite/{id}', [InviteController::class, 'show'])->name('invite.show');
    Route::post('/convite', [InviteController::class, 'store'])->name('invite.store');
    Route::patch('/convite', [InviteController::class, 'update'])->name('invite.update');
    Route::delete('/convite/{id}', [InviteController::class, 'destroy'])->name('invite.destroy');
});

/* Routes Star Rating */

Route::middleware('auth')->group(function () {
    Route::get('avaliacao', [StarRatingController::class, 'create'])->name('stars.create');
    Route::post('avaliacao', [StarRatingController::class, 'store'])->name('stars.store');
    Route::get('erro', function () {
        return view('invite.erro-invite');
    });
});


require __DIR__ . '/auth.php';
