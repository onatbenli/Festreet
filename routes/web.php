<?php

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

Route::get('/','HomeController@index');

Route::middleware(['auth'])->prefix('my')->group(function(){
    Route::get('account','UserController@index')->name('my.account');
    Route::post('account','UserController@edit')->name('my.account.edit');
    Route::get('fav','UserController@favs')->name('my.account.favs');
    Route::get('event','UserController@events')->name('my.account.events');
    Route::get('ticket','UserController@ticket')->name('my.account.tickets');
    Route::get('fav/create/{id}','UserController@favAdd')->name('my.account.favs.add');
    Route::get('fav/remove/{id}','UserController@favRemove')->name('my.account.favs.remove');
    Route::get('event/go/{id}','UserController@eventGo')->name('my.account.event.go');
    Route::get('event/go/remove/{id}','UserController@eventGoRemove')->name('my.account.event.go.remove');
});

Route::get('category/{slug}','EventController@category')->name('event.category');
Route::get('organizer/{slug}','EventController@organizer')->name('event.organizer');
Route::get('place/{slug}','EventController@place')->name('event.place');
Route::get('event/{slug}','EventController@show')->name('event.show');
Route::post('search/plan','HomeController@searchPlan')->name('search.plan');
Route::post('search','HomeController@search')->name('search');

Route::middleware(['auth'])->prefix('yonetim')->group(function(){
    Route::get('/','Admin\HomeController@index')->name('admin.home');
    Route::resource('/user','Admin\UserController');
    Route::resource('/organizer','Admin\OrganizerController');
    Route::resource('/place','Admin\PlaceController');
    Route::resource('/category','Admin\CategoryController');
    Route::resource('/country','Admin\CountryController');
    Route::resource('/city','Admin\CityController');
    Route::resource('/event','Admin\EventController');
    Route::get('/event/{id}/price','Admin\EventController@prices')->name('event.ticket.price');
    Route::get('/event/{id}/price/new','Admin\EventController@newPrices')->name('event.ticket.price.new');
    Route::delete('/event/price/{id}/delete','Admin\EventController@priceDelete')->name('event.ticket.price.destroy');
    Route::get('/event/price/{id}/edit','Admin\EventController@priceEdit')->name('event.ticket.price.edit');
    Route::post('/event/{id}/price','Admin\EventController@priceStore')->name('event.ticket.price.store');
    Route::put('/event/{id}/price/edit','Admin\EventController@priceUpdate')->name('event.ticket.price.update');
});


Route::prefix('query')->group(function(){
    Route::get('country/{id}','QueryController@country');
    Route::get('sub_category/{id}','QueryController@subCategory');
    Route::get('place/{id}','QueryController@place');
});

Route::get('dummy','HomeController@dummy');
Auth::routes();
