<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\DashboardSepatuController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardBrandController;
use App\Http\Controllers\DashboardColorsController;
use App\Http\Controllers\DashboardIncomesController;
use App\Http\Controllers\DashboardSizesController;
// use App\Http\Controllers\DashboardIncomesController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardPengambilanController;
use App\Http\Controllers\DashboardSepatuSizeController;
use App\Http\Controllers\DashboardPengeluaransController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginPelangganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\wishlistController;
use App\Models\TransactionDetail;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/h', function () {
    return view('home');
});

Route::get('/home', [SepatuController::class, 'index'])->name('sepatu.home');
Route::get('/', [LoginPelangganController::class, 'loginpelanggan']);
Route::get('/sepatu/{id}', [SepatuController::class, 'show'])->name('sepatu.detail');
Route::get('/aboutus', [SepatuController::class, 'aboutus']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
// Route::get('/loginpelanggan', [LoginPelangganController::class, 'loginpelanggan']);
// login logout pelanggan
Route::get('/loginpelanggan', [LoginPelangganController::class, 'loginpelanggan']);
Route::post('/loginpelanggan',[LoginPelangganController::class,'authenticate']);
Route::post('/logoutpelanggan',[LoginPelangganController::class,'logout']);

//register pelangggan
Route::post('/register', [RegisterController::class, 'register'])->name('register');

//register admin
Route::get('/register', [RegisterController::class, 'index']);

// login logout admin
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/login', [LoginController::class, 'login'])->name('login');

//list sepatu
Route::get('list',[ListController::class,'index'])->name('sepatu.list');
Route::get('list-search',[ListController::class,'search']);
Route::resource('/list',ListController::class);
Route::get('/merek/{id}/sepatu', [ListController::class, 'sepatuByMerek']);

// sepatu controller
Route::get('/', [SepatuController::class, 'index'])->name('sepatu.home');
Route::get('/sepatu/{id}', [SepatuController::class, 'show'])->name('sepatu.detail');
Route::get('/aboutus', [SepatuController::class, 'aboutus']);
Route::post('/pemesanan', [SepatuController::class, 'pemesanan']);
Route::post('/proses-bayar', [SepatuController::class, 'prosesBayar']);
Route::resource('/pemesanan/update-customer', SepatuController::class);

//wishlist
Route::get('/wishlist',[wishlistController::class,'index']);
Route::post('/wishlist/store',[wishlistController::class,'store']);
Route::resource('/wishlist',wishlistController::class);



Route::get('/sepatu/kategori/{kategori}', [SepatuController::class, 'filterByKategori'])->name('sepatu.kategori');

Route::get('/dashboard',[DashboardAdminController::class, 'Dashboard'])->middleware('auth');
Route::get('dshbrd-spt',[DashboardSepatuController::class,'index'])->middleware(['auth']);
Route::get('dshbrd-usr',[DashboardAdminController::class,'index'])->middleware(['auth']);
Route::get('dshbrd-brd',[DashboardBrandController::class,'index'])->middleware(['auth']);
Route::get('/cart',[cartController::class, 'index']);
Route::get('/dshbrd-pengambilan',[DashboardPengambilanController::class, 'index'])->middleware(['auth']);
Route::get('/checkout',[CheckoutController::class,'index']);

Route::post('/cart/{id}',[cartController::class,'store']);
Route::post('/checkout/store',[CheckoutController::class,'store']);
Route::post('/dashboard-order/store',[DashboardOrderController::class,'store']);







Route::resource('/dashboard-sepatu',DashboardSepatuController::class)->middleware(['auth']);
Route::resource('/dashboard-user',DashboardAdminController::class)->middleware(['auth']);
Route::resource('/dashboard-brand',DashboardBrandController::class)->middleware(['auth']);
Route::resource('/dashboard-pengeluarans',DashboardPengeluaransController::class)->middleware(['auth']);
Route::resource('/dashboard-sizes',DashboardSizesController::class)->middleware(['auth']);
Route::resource('/dashboard-color',DashboardColorsController::class)->middleware(['auth']);
Route::resource('/dashboard-order',DashboardOrderController::class)->middleware(['auth']);
Route::resource('/dashboard-stock',DashboardSepatuSizeController::class)->middleware(['auth']);
Route::resource('/dashboard/pengambilan',DashboardPengambilanController::class)->middleware(['auth']);
Route::resource('/cartedit',cartController::class);



Route::put('/dashboard-order/{id}/confirm', [SepatuController::class, 'confirmOrder'])->name('orders.confirm');
Route::resource('/dashboard-income',DashboardIncomesController::class)->middleware(['auth']);





// Route::middleware('auth:customers')->group(function () {
//     Route::get('/loginpelanggan', [LoginPelangganController::class, 'loginpelanggan']);
//     Route::get('/cart',[cartController::class, 'index']);
// });

// Route::middleware('auth:web')->group(function () {
//     Route::get('/login', [LoginController::class, 'loginpelanggan']);
// });

// Route untuk cetak PDF
Route::get('/dashboard-income/cetak-pdf', [DashboardIncomesController::class, 'show'])->name('incomes.cetak-pdf');
Route::get('/dashboard-pengeluarans/cetak-pdf', [DashboardPengeluaransController::class, 'show']);



