<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('user.index');
// });

Route::get('/', [App\Http\Controllers\User\IndexController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });

    //Bar Chart
    Route::get('/barchart', 'statistics\BarChartController@index')->name('barchart.index');
    Route::get('/barchart/create', 'statistics\BarChartController@create')->name('barchart.create');
    Route::post('/barchart/create', 'statistics\BarChartController@store')->name('barchart.store');
    Route::get('/barchart/{id}/edit', 'statistics\BarChartController@edit')->name('barchart.edit');
    Route::post('/barchart/{id}/update', 'statistics\BarChartController@update')->name('barchart.update');
    Route::post('/barchart/destroy', 'statistics\BarChartController@destroy')->name('barchart.destroy');

    //Pie Chart
    Route::get('/piechart', 'statistics\PieChartController@index')->name('piechart.index');
    Route::get('/piechart/create', 'statistics\PieChartController@create')->name('piechart.create');
    Route::post('/piechart/create', 'statistics\PieChartController@store')->name('piechart.store');
    Route::get('/piechart/{id}/edit', 'statistics\PieChartController@edit')->name('piechart.edit');
    Route::post('/piechart/{id}/update', 'statistics\PieChartController@update')->name('piechart.update');
    Route::post('/piechart/destroy', 'statistics\PieChartController@destroy')->name('piechart.destroy');

    //Quantum Stats Table
    Route::get('/quantum-stats', 'statistics\QuantumStatController@index')->name('stats.index');
    Route::get('/quantum-stats/create', 'statistics\QuantumStatController@create')->name('stats.create');
    Route::post('/quantum-stats/create', 'statistics\QuantumStatController@store')->name('stats.store');
    Route::get('/quantum-stats/{id}/edit', 'statistics\QuantumStatController@edit')->name('stats.edit');
    Route::post('/quantum-stats/{id}/update', 'statistics\QuantumStatController@update')->name('stats.update');
    Route::post('/quantum-stats/destroy', 'statistics\QuantumStatController@destroy')->name('stats.destroy');

    //Monthly Return Table
    Route::get('/monthly-return-table', [App\Http\Controllers\Statistics\MonthlyReturnController::class, 'index'])->name('monthly.index');
    Route::get('/monthly-return-table/create', [App\Http\Controllers\Statistics\MonthlyReturnController::class, 'create'])->name('monthly.create');
    Route::post('/monthly-return-table/create', [App\Http\Controllers\Statistics\MonthlyReturnController::class, 'store'])->name('monthly.store');
    Route::get('/monthly-return-table/{id}/edit', [App\Http\Controllers\Statistics\MonthlyReturnController::class, 'edit'])->name('monthly.edit');
    Route::post('/monthly-return-table/{id}/update', [App\Http\Controllers\Statistics\MonthlyReturnController::class, 'update'])->name('monthly.update');
    Route::post('/monthly-return-table/destroy', [App\Http\Controllers\Statistics\MonthlyReturnController::class, 'destroy'])->name('monthly.destroy');

    //Quantum statistics
    Route::get('/statistics', 'admin\BlogController@index')->name('blog.index');

    //Make Admin\visitor
    Route::get('/user-index', 'admin\UserlistController@index')->name('user.index');
    Route::get('/user/{id}/makeadmin', 'admin\UserlistController@makeadmin')->name('user.makeadmin');
    Route::get('/user/{id}/makevisitor', 'admin\UserlistController@makevisitor')->name('user.makevisitor');
    Route::get('/user/destroy', 'admin\UserlistController@destroy')->name('user.destroy');

    //Brochure
    Route::get('/brochure', 'brochure\BrochureController@index')->name('brochure.index');
    Route::get('/brochure/create', 'brochure\BrochureController@create')->name('brochure.create');
    Route::post('/brochure/create', 'brochure\BrochureController@store')->name('brochure.store');
    Route::post('/brochure/destroy', 'brochure\BrochureController@destroy')->name('brochure.destroy');
});

//Pages
Route::get('/contact-us', 'ContactController@index')->name('contact.index');
Route::post('/contact-us/store', 'ContactController@store')->name('contact.store');


//barjson
Route::get('stock/barchartjson', [App\Http\Controllers\Statistics\BarChartController::class, 'barjson']);
Route::get('stock/piechartjson', [App\Http\Controllers\Statistics\PieChartController::class, 'piejson']);
