<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Contracts\Http\Kernel;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\LoginadminController;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\TransaksiController;
use App\Models\Mobil;
use App\Http\Controllers\CustomerController;


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

/*Route::get('/', function () {
    return view('welcome');
});


Route::prefix('adm/loc/')->group(function () {
    Route::get('/login', [LoginadminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginadminController::class, 'login']);
});

Route::prefix('/')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register.submit');

});

Route::get('/register', [LoginadminController::class, 'registerForm'])->name('register');
Route::post('/register', [LoginadminController::class, 'register'])->name('admin.register');

Route::middleware('auth')->group(function () {
    // Rute-rute yang memerlukan autentikasi
    Route::prefix('adm/loc/')->group(function () {
        Route::get('/dash', function () {
            return view('dashboardadmin');
        })->name('dashboard');

    });

    Route::prefix('/')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        });
        Route::get('/customer', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
        Route::match(['GET', 'POST'], '/logout', [LoginController::class, 'logout'])->name('logout');        
    });

Route::get('/sopir', [SopirController::class, 'index'])->name('sopir.index');
Route::get('/sopir/create', [SopirController::class, 'create'])->name('sopir.create');
Route::post('/sopir', [SopirController::class, 'store'])->name('sopir.store');
Route::delete('/sopir/{id}', [SopirController::class, 'destroy'])->name('sopir.destroy');

Route::get('/sopir/{id}/edit', [SopirController::class, 'edit'])->name('sopir.edit');
Route::put('/sopir/{id}', [SopirController::class, 'update'])->name('sopir.update');


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.trans');
Route::get('transaksi/{id}/confirmation', 'TransaksiController@showConfirmation')->name('transaksi.showConfirmation');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
    Route::get('/mobil/create', [MobilController::class, 'create'])->name('mobil.create');
    Route::post('/mobil', [MobilController::class, 'store'])->name('mobil.store');
    Route::get('/mobil/{id}/edit', [MobilController::class, 'edit'])->name('mobil.edit');
    Route::put('/mobil/{id}', [MobilController::class, 'update'])->name('mobil.update');
    Route::delete('/mobil/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');
    Route::post('/logout', [LoginadminController::class, 'logout'])->name('logout');
});



});
*/


// ...
/*
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register.submit');

Route::middleware(['guest:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
    //    Route::get('/', [LoginadminController::class, 'showLoginForm'])->name('admin.login');
    //    Route::post('/login', [LoginadminController::class, 'login'])->name('admin.login.submit');
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginadminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginadminController::class, 'login']);
    Route::get('/tambahadmin', [LoginadminController::class, 'tambahadminForm'])->name('admin.tambahadmin');
    Route::post('/tambahadmin', [LoginadminController::class, 'tambahadmin'])->name('admin.register.submit');
});

Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
Route::get('/mobil/create', [MobilController::class, 'create'])->name('mobil.create');

Route::post('/mobil', [MobilController::class, 'store'])->name('mobil.store');
Route::get('/mobil/{id}/edit', [MobilController::class, 'edit'])->name('mobil.edit');
Route::put('/mobil/{id}', [MobilController::class, 'update'])->name('mobil.update');
Route::delete('/mobil/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');
// Routes for authenticated admin
Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::post('/logout', [LoginadminController::class, 'logout'])->name('logout.admin');
    });
});
Route::get('/customer', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
Route::match(['GET', 'POST'], '/logout', [LoginController::class, 'logout'])->name('logout');        
Route::get('/sopir', [SopirController::class, 'index'])->name('sopir.index');
Route::get('/sopir/create', [SopirController::class, 'create'])->name('sopir.create');
Route::post('/sopir', [SopirController::class, 'store'])->name('sopir.store');
Route::delete('/sopir/{id}', [SopirController::class, 'destroy'])->name('sopir.destroy');

Route::get('/sopir/{id}/edit', [SopirController::class, 'edit'])->name('sopir.edit');
Route::put('/sopir/{id}', [SopirController::class, 'update'])->name('sopir.update');


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.trans');
Route::get('transaksi/{id}/confirmation', 'TransaksiController@showConfirmation')->name('transaksi.showConfirmation');
    Route::get('/customer', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
    Route::match(['GET', 'POST'], '/logout', [LoginController::class, 'logout'])->name('logout.user');

Route::get('/', function () {
    return view('dashboard');
});


// Other routes...


// Other routes...


// Routes for authenticated user
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    // Other user routes
});




*/

/*
// Route untuk menampilkan form login admin
Route::get('/loginadmin', [LoginadminController::class, 'showLoginForm'])->name('loginadmin.form');

// Route untuk memproses login admin
Route::post('/loginadmin', [LoginadminController::class, 'login'])->name('loginadmin.login');

// Route untuk logout admin
Route::post('/logoutadmin', [LoginadminController::class, 'logout'])->name('loginadmin.logout');

// Route untuk menampilkan form registrasi admin
Route::get('/registeradmin', [LoginadminController::class, 'registerForm'])->name('loginadmin.register.form');

// Route untuk memproses registrasi admin
Route::post('/registeradmin', [LoginadminController::class, 'register'])->name('loginadmin.register');

// Route untuk menampilkan form login user
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.submit');

// Route untuk memproses login user
Route::post('/login', [LoginController::class, 'login'])->name('login.login');

// Route untuk logout user
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

// Route untuk menampilkan form registrasi user
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register.form');

// Route untuk memproses registrasi user
Route::post('/register', [LoginController::class, 'register'])->name('register');

// Route untuk CRUD mobil
Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
Route::get('/mobil/create', [MobilController::class, 'create'])->name('mobil.create');
Route::post('/mobil', [MobilController::class, 'store'])->name('mobil.store');
Route::get('/mobil/{id}/edit', [MobilController::class, 'edit'])->name('mobil.edit');
Route::put('/mobil/{id}', [MobilController::class, 'update'])->name('mobil.update');
Route::delete('/mobil/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');
*/
/*
Route::post('/sopir', [SopirController::class, 'store'])->name('sopir.store');
Route::get('/sopir', [SopirController::class, 'index'])->name('sopir.index');
Route::get('/sopir/create', [SopirController::class, 'create'])->name('sopir.create');
Route::post('/sopir', [SopirController::class, 'store'])->name('sopir.store');
Route::delete('/sopir/{id}', [SopirController::class, 'destroy'])->name('sopir.destroy');

Route::get('/sopir/{id}/edit', [SopirController::class, 'edit'])->name('sopir.edit');
Route::put('/sopir/{id}', [SopirController::class, 'update'])->name('sopir.update');

*/





Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.user.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.user');


// Route untuk login admin
Route::middleware('guest:admin')->group(function () {
    Route::get('/login/admin', [LoginAdminController::class, 'showLoginForm'])->name('admin.admsign');
    Route::post('/login/admin', [LoginAdminController::class, 'admsign'])->name('login.admin');
});


Route::middleware('auth:user')->group(function () {
    Route::post('/logout/user', [LoginController::class, 'logout'])->name('logout.user');
});

Route::middleware('auth:admin')->group(function () {
    Route::post('/admin/logout', [LoginadminController::class, 'logout'])->name('logout.admin');
});


// Route untuk logout admin
    Route::get('/admin/dashboard', function () {
        return view('dashboardadmin');
    });
    Route::get('/admin/tambah', [LoginadminController::class, 'tambahadminForm'])->name('tambahadmin');
    Route::post('/admin/tambah', [LoginadminController::class, 'tambahadmin'])->name('admin.tambah');
    Route::get('/admin/sopir', [SopirController::class, 'index'])->name('sopir.index');
    Route::get('/admin/sopir/create', [SopirController::class, 'create'])->name('sopir.create');
    Route::post('/admin/sopir', [SopirController::class, 'store'])->name('sopir.store');
    Route::get('/admin/sopir/{id}/edit', [SopirController::class, 'edit'])->name('sopir.edit');
    Route::put('/admin/sopir/{id}', [SopirController::class, 'update'])->name('sopir.update');
    Route::delete('/admin/sopir/{id}', [SopirController::class, 'destroy'])->name('sopir.destroy');
    Route::get('/admin/mobil', [MobilController::class, 'index'])->name('mobil.index');
    Route::get('/admin/mobil/create', [MobilController::class, 'create'])->name('mobil.create');
    Route::post('/admin/mobil', [MobilController::class, 'store'])->name('mobil.store');
    Route::get('/admin/mobil/{id}/edit', [MobilController::class, 'edit'])->name('mobil.edit');
    Route::put('/admin/mobil/{id}', [MobilController::class, 'update'])->name('mobil.update');
    Route::delete('/admin/mobil/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');



    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{id}', [TransaksiController::class, 'showConfirmation'])->name('transaksi.showConfirmation');
Route::get('/transaksi/{id}', [TransaksiController::class, 'tampil'])->name('transaksi.show');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

Route::get('/admin/customer/show', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');
Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('transaksi/create/{id_customer}', [TransaksiController::class, 'create'])->name('transaksi.create');

Route::get('/dashboard', [MobilController::class, 'tampil'])->name('dashboard');

