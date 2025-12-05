<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\AssesmentController;
use App\Http\Controllers\Web\ContentController;
use App\Http\Controllers\Web\FeedbackController;
use App\Http\Controllers\Web\MasukanController;
use App\Http\Controllers\Web\MateriController;
use App\Http\Controllers\Web\PenggunaController;
use App\Http\Controllers\Web\User\UserContentController;
use App\Http\Controllers\Web\User\UserFeedbackController;
use App\Http\Controllers\Web\User\UserPenggunaController;
use App\Models\Content;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'admin', 'verified'])->name('dashboard');

Route::get('/dashboard-siswa', function () {
    $contents = Content::whereHas('user_contents', function ($query) {
        $query->where('user_id', auth()->user()->id);
    })->limit(3)->get();

    return view('dashboard-user', compact('contents'));
})->middleware(['auth', 'user', 'verified'])->name('dashboard.user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('materi')->group(function () {
        Route::get('', [ContentController::class, 'index'])->name('materi.index');
        Route::get('{id}/show', [ContentController::class, 'show'])->name('materi.show');
        Route::get('tambah', [ContentController::class, 'create'])->name('materi.create');
        Route::post('', [ContentController::class, 'store'])->name('materi.store');
        Route::get('{id}/ubah', [ContentController::class, 'edit'])->name('materi.edit');
        Route::put('{id}', [ContentController::class, 'update'])->name('materi.update');
        Route::get('{id}/hapus', [ContentController::class, 'delete'])->name('materi.delete');

        Route::prefix('{content_id}/assesment')->group(function () {
            Route::get('tambah', [AssesmentController::class, 'create'])->name('assesment.create');
            Route::post('', [AssesmentController::class, 'store'])->name('assesment.store');
            Route::get('ubah', [AssesmentController::class, 'edit'])->name('assesment.edit');
            Route::put('', [AssesmentController::class, 'update'])->name('assesment.update');
            Route::get('{id}/delete', [AssesmentController::class, 'delete'])->name('assesment.delete');
            Route::get('export', [AssesmentController::class, 'export'])->name('assesment.export');
        });
    });

    Route::prefix('masukan')->group(function () {
        Route::get('', [FeedbackController::class, 'index'])->name('masukan.index');
        Route::get('{id}/show', [FeedbackController::class, 'show'])->name('masukan.show');
        Route::get('tambah', [FeedbackController::class, 'create'])->name('masukan.create');
        Route::post('', [FeedbackController::class, 'store'])->name('masukan.store');
        Route::get('{id}/ubah', [FeedbackController::class, 'edit'])->name('masukan.edit');
        Route::put('{id}', [FeedbackController::class, 'update'])->name('masukan.update');
        Route::get('{id}/hapus', [FeedbackController::class, 'delete'])->name('masukan.delete');
    });

    Route::prefix('pengguna')->group(function () {
        Route::get('', [PenggunaController::class, 'index'])->name('pengguna.index');
        Route::get('tambah', [PenggunaController::class, 'create'])->name('pengguna.create');
        Route::post('', [PenggunaController::class, 'store'])->name('pengguna.store');
        Route::get('{id}/ubah', [PenggunaController::class, 'edit'])->name('pengguna.edit');
        Route::put('{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
        Route::get('{id}/hapus', [PenggunaController::class, 'delete'])->name('pengguna.delete');
    });
});

// User
Route::middleware(['auth', 'user'])->group(function () {
    Route::prefix('materi-siswa')->group(function () {
        Route::get('', [UserContentController::class, 'index'])->name('materi.user.index');
        Route::post('add', [UserContentController::class, 'add'])->name('materi.user.add');
        Route::get('{id}/show', [UserContentController::class, 'show'])->name('materi.user.show');
        Route::get('{id}/assesment', [UserContentController::class, 'assesment'])->name('materi.user.assesment');
        Route::post('{id}', [UserContentController::class, 'submit'])->name('materi.user.submit');
    });

    Route::prefix('masukan-siswa')->group(function () {
        Route::get('', [UserFeedbackController::class, 'index'])->name('masukan.user.index');
        Route::post('', [UserFeedbackController::class, 'store'])->name('masukan.user.store');
    });

    Route::prefix('pengguna-siswa')->group(function () {
        Route::get('', [UserPenggunaController::class, 'index'])->name('pengguna.user.index');
        Route::put('', [UserPenggunaController::class, 'update'])->name('pengguna.user.update');
    });
});

require __DIR__.'/auth.php';
