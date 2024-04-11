<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});


Route::get('/admin/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/users', function () { // Kullanıcıları listele
    return Inertia::render('Users');
})->middleware(['auth', 'verified'])->name('users');

Route::get('/admin/user/register', function () { // Yeni Kullanıcı ekle
    return Inertia::render('UserRegister');
})->middleware(['auth', 'verified'])->name('users');

Route::get('/admin/sections', function () { // Bölümleri Listele
    return Inertia::render('Sections');
})->middleware(['auth', 'verified'])->name('sections');

Route::get('/admin/sections/store', function () { // Yeni Bölüm ekle
    return Inertia::render('SectionStore');
})->middleware(['auth', 'verified'])->name('sections');

Route::get('/admin/lessons', function () { // Bölümleri Listele
    return Inertia::render('Lessons');
})->middleware(['auth', 'verified'])->name('sections');

Route::get('/admin/lesson/store', function () { // Yeni Bölüm ekle
    return Inertia::render('LessonStore');
})->middleware(['auth', 'verified'])->name('lesson.store');

Route::fallback(function () {
    return redirect('/admin/dashboard');
});

Route::middleware('auth:sanctum')->get('/admin/userProfile', [UserController::class, 'profile']); // Oturum açan kullanıcı bilgileri

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::view('/{any?}', 'welcome')->where('any', '^(?!api).*$');
