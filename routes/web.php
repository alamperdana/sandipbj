<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('utama');
});

Route::get('/login', function (){
   return view('home.login');
})->name('login');


// Route::get('/login', 'App\Http\Controllers\Admin\AdminController@login')
//     ->name('admin.login');

Route::POST('/login', 'App\Http\Controllers\Admin\AdminController@login')
    ->name('admin.login');

Route::get('/home/pengajuan', 'App\Http\Controllers\Home\HomeController@pengajuan')
    ->name('home.pengajuan');

Route::get('/home/buatbaru', 'App\Http\Controllers\Home\HomeController@buatbaru')
    ->name('home.buatbaru');

Route::POST('/home/pengajuan/submit', 'App\Http\Controllers\Home\HomeController@submit_pengajuan')
    ->name('admin.submit_pengajuan');


Route::GET('/skpd/getdata/{skpd}', 'App\Http\Controllers\Home\HomeController@opd');

// ADMIN
Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@dashboard')
    ->name('admin.dashboard')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/pengajuan/export', 'App\Http\Controllers\Admin\AdminController@export_pengajuan')
    ->name('admin.export_pengajuan')->middleware(\App\Http\Middleware\CheckSession::class);

/*INI DITAMBAH LAGI*/
Route::get('/admin/pegawai/export', 'App\Http\Controllers\Admin\AdminController@export_infopengajuan')
    ->name('admin.export_pengajuan')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/pengajuan/byid/export/{id}', 'App\Http\Controllers\Admin\AdminController@export_pengajuan_byid')
    ->name('admin.export_pengajuan')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/logout', 'App\Http\Controllers\Admin\AdminController@logout')
    ->name('admin.logout')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/jabatan', 'App\Http\Controllers\Admin\AdminController@jabatan')
    ->name('admin.jabatan')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/pegawai', 'App\Http\Controllers\Admin\AdminController@pegawai')
    ->name('admin.pegawai')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/pegawai/add', 'App\Http\Controllers\Admin\AdminController@add_pegawai_page')
    ->name('home.add_pegawai_page')->middleware(\App\Http\Middleware\CheckSession::class);

Route::POST('/admin/pegawai/add', 'App\Http\Controllers\Admin\AdminController@add_pegawai')
    ->name('home.add_pegawai')->middleware(\App\Http\Middleware\CheckSession::class);

Route::POST('/admin/akun/add', 'App\Http\Controllers\Admin\AdminController@add_akun')
    ->name('home.add_akun')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/pengajuan', 'App\Http\Controllers\Admin\AdminController@pengajuan')
    ->name('admin.pengajuan')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/buatakun/', 'App\Http\Controllers\Admin\AdminController@buatAkun')
    ->name('admin.pengajuan_buatakun')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/jabatan/detail/{id}', 'App\Http\Controllers\Admin\AdminController@detail_jabatan')
    ->name('admin.detail_jabatan')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/pegawai/detail/{id}', 'App\Http\Controllers\Admin\AdminController@detail_pegawai')
    ->name('admin.detail_pegawai')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/akun/update-status/{id}', 'App\Http\Controllers\Admin\AdminController@edit_akun_status')
    ->name('admin.update_akun_status')->middleware(\App\Http\Middleware\CheckSession::class);

Route::post('/admin/jabatan/add', 'App\Http\Controllers\Admin\AdminController@add_jabatan')
    ->name('admin.add_jabatan')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/jabatan/delete/{id}', 'App\Http\Controllers\Admin\AdminController@delete_jabatan')
    ->name('admin.delete_jabatan')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/akun/delete/{id}', 'App\Http\Controllers\Admin\AdminController@delete_akun')
    ->name('admin.delete_akun')->middleware(\App\Http\Middleware\CheckSession::class);


/*INI DITAMBAH*/
Route::get('/admin/buatakun/delete/{id}', 'App\Http\Controllers\Admin\AdminController@delete_pegawai')
    ->name('admin.delete_pegawai')->middleware(\App\Http\Middleware\CheckSession::class);


Route::get('/admin/pegawai/delete/{id}', 'App\Http\Controllers\Admin\AdminController@delete_pegawai2')
    ->name('admin.delete_pegawai2')->middleware(\App\Http\Middleware\CheckSession::class);

Route::get('/admin/pengajuan/delete/{id}', 'App\Http\Controllers\Admin\AdminController@delete_pengajuan')
    ->name('admin.delete_pengajuan')->middleware(\App\Http\Middleware\CheckSession::class);

Route::POST('/admin/jabatan/update/{id}', 'App\Http\Controllers\Admin\AdminController@update_jabatan')
    ->name('admin.update_jabatan')->middleware(\App\Http\Middleware\CheckSession::class);

Route::POST('/admin/pegawai/update/{id}', 'App\Http\Controllers\Admin\AdminController@update_pegawai')
    ->name('admin.update_pegawai')->middleware(\App\Http\Middleware\CheckSession::class);

Route::GET('/admin/pengajuan/printpengajuan/{id}', 'App\Http\Controllers\Admin\AdminController@printpengajuan')
    ->name('admin.printpengajuan')->middleware(\App\Http\Middleware\CheckSession::class);
    
Route::get('/admin/jabatan/add', function (){
    $data = [
        'title' => " Add Jabatan | ".env('APP_NAME'),
        'data' => "Hello",
        'menu' => 'jabatan',
        'page_name' => 'Add Jabatan',
        'page' => "admin.pages.add_jabatan"
    ];
    return view('admin.layout', ['data' => $data] );
})->middleware(\App\Http\Middleware\CheckSession::class);
