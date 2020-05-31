<?php

use Illuminate\Support\Facades\Route;
use App\Models\Countrie;
use App\Models\Citie;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



     Route::resource('countries','Admin\countriesController');
     Route::post('citie','Admin\countriesController@storecitie');
     Route::post('destroycitie/{id}','Admin\countriesController@destroycitie');
   
Route::get('dropdown', function(Request $request){
//  $id = Input::get('option');
$countrie = Countrie::find($request->option);
    $ctiy = Countries::where('cca3', $countrie->code)->first()->hydrateStates()->states->pluck('name', 'postal');
 //   dd($request);
    return $ctiy;
});