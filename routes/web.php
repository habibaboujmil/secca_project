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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::group(['prefix' => '/brands'], function () {
		Route::get('/', 'App\Http\Controllers\BrandsController@index')->name('brands');
		Route::post('/', 'App\Http\Controllers\BrandsController@create')->name('new_brand');
		Route::get('/{id}', 'App\Http\Controllers\BrandsController@materialsList')->name('brand_details');
		Route::post('/{id}', 'App\Http\Controllers\BrandsController@edite');
		Route::delete('/{id}', 'App\Http\Controllers\BrandsController@delete')->name('brand_delete');

	});
	Route::group(['prefix' => '/materials'], function () {
		Route::post('/', 'App\Http\Controllers\MaterialsController@create')->name('new_material');
		Route::post('/upload', 'App\Http\Controllers\MaterialsController@addMaterialsWithExcel')->name('upload_material');
		Route::post('/{id}', 'App\Http\Controllers\MaterialsController@edite');
		Route::get('/{id}', 'App\Http\Controllers\BrandsController@materialsList')->name('brand_details');
		Route::get('/out-of-stock/{id}', 'App\Http\Controllers\MaterialsController@outOfStock')->name('outOfStock');
		Route::delete('/{id}', 'App\Http\Controllers\MaterialsController@delete')->name('material_delete');

	});

	Route::group(['prefix' => '/affairs'], function () {
		Route::get('/', 'App\Http\Controllers\AffairsController@index')->name('affairList');
		Route::post('/via-excel', 'App\Http\Controllers\AffairsController@createViaExcel')->name('createViaExcel');
		Route::post('/one-by-one', 'App\Http\Controllers\AffairsController@createOneByOne')->name('createOneByOne');
		Route::get('/details/{id}', 'App\Http\Controllers\AffairsController@details')->name('affair_details');
		Route::delete('/{id}', 'App\Http\Controllers\AffairsController@delete')->name('delete_affair');
		Route::get('/create', function () {
			return view('pages.affairs.create');
		})->name('create_affairs');
		Route::group(['prefix' => '/equipment'], function () {
			Route::post('/', 'App\Http\Controllers\AffairsController@createEquipment')->name('create_equipment');
			Route::post('/{id}', 'App\Http\Controllers\AffairsController@editeEquipment')->name('edite_equipment');
			Route::delete('/{id}', 'App\Http\Controllers\AffairsController@deleteEquipment')->name('delete_equipment');

		});
	});
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['names' => [
		'create' => 'user.store'
	]], ['except' => ['show','update']]);
	// Route::get('user', 'App\Http\Controllers\UserController@index')->name('usersListe');
	Route::post('user/{id}', 'App\Http\Controllers\UserController@update');
	
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

