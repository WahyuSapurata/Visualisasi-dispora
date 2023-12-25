<?php

use Illuminate\Support\Facades\DB;
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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Route::get('/', function () {
    //     $data = DB::table('citizens')->find(7);
    //     dd($data);
    //     return view('welcome');
    // });
    Route::get('/', 'LandingController@demografi')->name('demografi');
    Route::get('/pendidikan', 'LandingController@pendidikan')->name('pendidikan');
    Route::get('/pekerjaan', 'LandingController@pekerjaan')->name('pekerjaan');
    Route::get('/status', 'LandingController@status')->name('status');
    Route::get('/teknologi', 'LandingController@teknologi')->name('teknologi');
    Route::get('/pendidikan', 'LandingController@pendidikan')->name('pendidikan');
    Route::get('/kecamatan', 'LandingController@kecamatan')->name('kecamatan');

    Route::get('/export-excel', 'ExportExcel@export_excel')->name('export-excel');
    Route::get('/data-master', 'DataMaster@data_master')->name('data-master');
    Route::get('/jenis-generasi', 'DataMaster@jenis_generasi')->name('jenis-generasi');
    Route::get('/pekerjaan-get', 'DataMaster@pekerjaan')->name('pekerjaan-get');
    Route::get('/status-get', 'DataMaster@status')->name('status-get');


    Route::get('/kecamatan-get', 'DataMaster@kecamatan')->name('kecamatan-get');
});
