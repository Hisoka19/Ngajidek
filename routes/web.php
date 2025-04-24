<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    Auth\LoginController,
    Auth\RegisterController,
    SiswaController,
    ZoomController,
    PaymentController,
    HomeController,
    CourseController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Landing Page
Route::view('/', 'welcome')->name('home');

// 🔑 Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// 🚪 Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 🎓 SISWA DASHBOARD
Route::middleware(['auth', 'verified', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');
});

// 💳 PAYMENT ROUTES
Route::middleware(['auth'])->prefix('payment')->name('payment.')->group(function () {
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/{class}', [PaymentController::class, 'createPayment'])->name('create');
});

// 🔄 API ROUTES (Midtrans)
Route::prefix('api')->group(function () {
    Route::post('/midtrans/callback', [PaymentController::class, 'paymentCallback'])
        ->withoutMiddleware(['web', 'csrf']);
});

// 👤 Profile Routes (Shared untuk semua role)
Route::middleware(['auth'])->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

// 📚 General Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');
});

require __DIR__.'/auth.php';
