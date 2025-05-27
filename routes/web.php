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
Route::get('/test', function () {
    auth()->loginUsingId(4);

    return auth()->user()->role === 'pengajar'
        ? 'User adalah pengajar'
        : 'User bukan pengajar';
});


// 🔑 Authentication Routes
Route::middleware('guest')->group(function () {
   Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
   // Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// 🚪 Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// =============================================
// 🔐 ADMIN & PENGAJAR DASHBOARD (FILAMENT)
// =============================================
// Tidak perlu route manual ke dashboard Filament, akses langsung ke /admin dan /pengajar
Route::middleware(['auth', 'role:pengajar'])->prefix('pengajar')->name('pengajar.')->group(function () {});
// =============================================
// 🎓 SISWA DASHBOARD (TABLER)
// =============================================
Route::middleware(['auth', 'verified'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');
    // Tambahkan route siswa lainnya di sini
});

// =============================================
// 🎓 PENGAJAR CUSTOM ROUTES (DILUAR FILAMENT)
// =============================================
Route::middleware(['auth', 'verified'])->prefix('pengajar')->name('pengajar.')->group(function () {


    // Route khusus pengajar di luar Filament
    Route::get('/zoom', [ZoomController::class, 'index'])->name('zoom.index');
    Route::post('/zoom', [ZoomController::class, 'createMeeting'])->name('zoom.create');
    Route::get('/profile', [PengajarController::class, 'profile'])->name('profile');
    // Jika perlu, tambahkan route custom lain di sini
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

// =============================================
// NOTE: Tidak perlu route manual dashboard ke Filament, cukup akses /admin, /pengajar, /siswa
// =============================================

require __DIR__ . '/auth.php';
