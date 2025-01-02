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
use App\Http\Controllers\DashboardCustomerController;
use App\Http\Controllers\DashboardIncomesController;
use App\Http\Controllers\DashboardKategoriPengeluaranController;
use App\Http\Controllers\DashboardSizesController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardPengambilanController;
use App\Http\Controllers\DashboardSepatuSizeController;
use App\Http\Controllers\DashboardPengeluaransController;
use App\Http\Controllers\HistoryOrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginPelangganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\wishlistController;
use App\Models\TransactionDetail;

// Home route
Route::get('/h', function () {
    return view('home');
});

// SepatuController routes
Route::get('/home', [SepatuController::class, 'index'])->name('sepatu.home');
Route::get('/sepatu/{id}', [SepatuController::class, 'show'])->name('sepatu.detail');
Route::get('/aboutus', [SepatuController::class, 'aboutus']);
Route::post('/pemesanan', [SepatuController::class, 'pemesanan']);
Route::get('/keranjang', [SepatuController::class, 'keranjang']);
Route::post('/proses-bayar', [SepatuController::class, 'prosesBayar']);
Route::post('/clean-cart/{id}', [SepatuController::class, 'cleanCart']);
Route::resource('/pemesanan/update-customer', SepatuController::class);
Route::get('/sepatu/kategori/{kategori}', [SepatuController::class, 'filterByKategori'])->name('sepatu.kategori');

// ListController routes
Route::get('list', [ListController::class, 'index'])->name('sepatu.list');
Route::get('list-search', [ListController::class, 'search']);
Route::resource('/list', ListController::class);
Route::get('/merek/{id}/sepatu', [ListController::class, 'sepatuByMerek']);

// Login and Register routes
Route::get('/', [LoginPelangganController::class, 'loginpelanggan']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/loginpelanggan', [LoginPelangganController::class, 'loginpelanggan']);
Route::post('/loginpelanggan', [LoginPelangganController::class, 'authenticate']);
Route::post('/logoutpelanggan', [LoginPelangganController::class, 'logout']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// WishlistController routes
Route::get('/wishlist', [wishlistController::class, 'index']);
Route::post('/wishlist/store', [wishlistController::class, 'store']);
Route::resource('/wishlist', wishlistController::class);

// HistoryOrderController routes
Route::get('/history-order', [HistoryOrderController::class, 'index']);
Route::resource('/detail-order', HistoryOrderController::class);

// DashboardOrderController routes
Route::put('/update-status/{id}', [DashboardOrderController::class, 'status']);
Route::resource('/dashboard-order', DashboardOrderController::class)->middleware(['auth']);
Route::put('/dashboard-order/{id}/confirm', [DashboardOrderController::class, 'confirmOrder'])->name('orders.confirm');
Route::post('/dashboard-order/store', [DashboardOrderController::class, 'store']);

// DashboardPengambilanController routes
Route::resource('/dashboard/pengambilan', DashboardPengambilanController::class)->middleware(['auth']);
Route::get('/dshbrd-pengambilan', [DashboardPengambilanController::class, 'index'])->middleware(['auth']);

// DashboardAdminController routes
Route::get('/dashboard', [DashboardAdminController::class, 'Dashboard'])->middleware('auth');
Route::get('dshbrd-usr', [DashboardAdminController::class, 'index'])->middleware(['auth']);
Route::resource('/dashboard-user', DashboardAdminController::class)->middleware(['auth']);

// DashboardSepatuController routes
Route::get('dshbrd-spt', [DashboardSepatuController::class, 'index'])->middleware(['auth']);
Route::resource('/dashboard-sepatu', DashboardSepatuController::class)->middleware(['auth']);

// DashboardBrandController routes
Route::get('dshbrd-brd', [DashboardBrandController::class, 'index'])->middleware(['auth']);
Route::resource('/dashboard-brand', DashboardBrandController::class)->middleware(['auth']);

// DashboardPengeluaransController routes
Route::resource('/dashboard-pengeluarans', DashboardPengeluaransController::class)->middleware(['auth']);
Route::get('/dashboard-pengeluarans/cetak-pdf', [DashboardPengeluaransController::class, 'show']);

// DashboardIncomesController routes
Route::resource('/dashboard-income', DashboardIncomesController::class)->middleware(['auth']);
Route::get('/dashboard-income/cetak', [DashboardIncomesController::class, 'show']);

// DashboardSizesController routes
Route::resource('/dashboard-sizes', DashboardSizesController::class)->middleware(['auth']);

// DashboardColorsController routes
Route::resource('/dashboard-color', DashboardColorsController::class)->middleware(['auth']);

// DashboardSepatuSizeController routes
Route::resource('/dashboard-stock', DashboardSepatuSizeController::class)->middleware(['auth']);

// CartController routes
Route::get('/cart', [cartController::class, 'index']);
Route::post('/cart/{id}', [cartController::class, 'store']);
Route::resource('/cartedit', cartController::class);

// CheckoutController routes
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout/store', [CheckoutController::class, 'store']);

// Kategori Pengeluaran
Route::get('/dashboard-kategori-pengeluaran', [DashboardKategoriPengeluaranController::class, 'index'])->middleware(['auth']);
Route::resource('/dashboard-kategori-pengeluaran', DashboardKategoriPengeluaranController::class)->middleware(['auth']);

//Customer
Route::get('/dashboard-customer', [DashboardCustomerController::class, 'index'])->middleware(['auth']);
Route::resource('/dashboard-customer', DashboardCustomerController::class)->middleware(['auth']);
