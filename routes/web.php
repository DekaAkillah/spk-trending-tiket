<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\HitungController;
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
Route::get('/form', function () {
    return view('pengunjung.index',[
        'title' => 'Admin Page'
    ]);
});
Route::get('/', function () {
    return view('admin.login',[
        'title' => 'Admin Page'
    ]);
});
Route::get('/login', function(){
    return view('admin.login');})->name('login');
Route::post('/login', [LoginController::class, 'auth']);
Route::get('/view', function(){
    $dataAlter = \App\Models\Alternatif::count();
    $dataKrit = \App\Models\Kriteria::count();
    return view('admin.index',[
        "title" => "View",
        'dataAlter' =>  $dataAlter,
        'dataKrit' =>  $dataKrit
    ]);
});
Route::post('/logout', [LoginController::class, 'logout']);
Route::resource('/admin/visitor', VisitorController::class);
Route::get('/pengunjung/viewPDF', [PdfController::class, 'generatePdf'])->name('view-pdf');
Route::resource('admin/kriteria', KriteriaController::class);
Route::resource('admin/alternatif', AlternatifController::class);
Route::resource('admin/tiket', TiketController::class);
Route::resource('/admin/account', UserController::class);
Route::get('/admin/perhitungan', [HitungController::class, 'hitung']);
Route::get('/admin/normalisasi', [HitungController::class, 'index']);
// Route::get('/pdf-ex', [PdfController::class, 'generatePdf'])->name('pdf-ex');
Route::get('/cobapdf', function () {
    $visitor = \App\Models\Visitor::all();
    return view('pengunjung.viewPDF',[
        'title' => 'Admin Page',
        'visitor' => $visitor
    ]);
});