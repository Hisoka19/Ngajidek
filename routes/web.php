<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    Auth\LoginController,
    Auth\RegisterController,
    SiswaController,
    PengajarController,
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

// 🏠 Landing Page & Test Route
Route::view('/', 'welcome')->name('home');
Route::get('/test', fn() => auth()->loginUsingId(4) && auth()->user()->hasRole('pengajar')
    ? 'User adalah pengajar'
    : 'User bukan pengajar');

// 🔑 Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// 🚪 Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// =============================================
// 🔐 ADMIN & PENGAJAR DASHBOARD (FILAMENT)
// =============================================
// Note: Filament akan menangani routes untuk:
// - /admin/*
// - /pengajar/*
// Pastikan konfigurasi di PanelProvider sudah benar

// =============================================
// 🎓 SISWA DASHBOARD (TABLER)
// =============================================
Route::middleware(['auth', 'verified', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');
    // Tambahkan route siswa lainnya di sini
});

// =============================================
// 🎓 PENGAJAR CUSTOM ROUTES (DILUAR FILAMENT)
// =============================================
Route::middleware(['auth', 'verified', 'role:pengajar'])->prefix('pengajar')->name('pengajar.')->group(function () {
    // Route khusus pengajar di luar Filament
    Route::get('/zoom', [ZoomController::class, 'index'])->name('zoom.index');
    Route::post('/zoom', [ZoomController::class, 'createMeeting'])->name('zoom.create');

    // Jika perlu tambahan route manual untuk pengajar
    Route::get('/profile', [PengajarController::class, 'profile'])->name('profile');
});

// =============================================
// 💳 PAYMENT ROUTES
// =============================================
Route::middleware(['auth'])->prefix('payment')->name('payment.')->group(function () {
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/{class}', [PaymentController::class, 'createPayment'])->name('create');
});

// =============================================
// 🔄 API ROUTES (Midtrans)
// =============================================
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
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');
});

// routes/web.php
Route::middleware(['auth', 'role:pengajar'])->prefix('pengajar')->name('pengajar.')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('filament.pengajar.pages.dashboard'); // Pastikan route ini ada
    })->name('dashboard');

    // Tambahkan route lainnya sesuai kebutuhan
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('filament.admin.pages.dashboard'); // Arahkan ke dashboard Filament
    })->name('dashboard');
});




require __DIR__.'/auth.php';
