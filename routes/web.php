<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Admin Routes

Route::group(['middleware' =>['web', 'admin']],function(){

    Route::get('/adminpanel','AdminController@index');
    Route::resource('/adminpanel/users','UserController')->except('show');


    //SiteSettings
    Route::get('/adminpanel/sitesettings','SiteSettingController@index');
    Route::post('/adminpanel/sitesettings','SiteSettingController@store');


    //buildings
    Route::get('/adminpanel/buildings/data','BuildingController@anyData');
    Route::resource('/adminpanel/buildings','BuildingController')->except('show');
    Route::get('/user/create/building','BuildingController@userAddView');
    Route::post('/user/create/building','BuildingController@userStore');
    Route::get('/user/buildingShow','BuildingController@showUserBuilding')->middleware('auth');
    Route::get('/user/buildingShowwaiting','BuildingController@buildingShowwaiting')->middleware('auth');
    Route::get('/user/edit/building/{id}','BuildingController@userEditBuilding')->middleware('auth');
    Route::patch('/user/update/building','BuildingController@userUpdateBuilding')->middleware('auth');
//    Route::get('/user/editsetting','UserController@userEditInfo')->middleware('auth');
//    Route::patch('/user/editsetting',['as' => 'user.editsetting' , 'uses'=> 'UserController@userUpdateProfile'])->middleware('auth');


    //contacts
    Route::resource('/adminpanel/contact','ContactController')->except('show');
    Route::get('/adminpanel/contact/{id}/delete','ContactController@delete');
    Route::get('/adminpanel/contact/data','ContactController@anyData');

});





//User Routes


Route::group(['middleware' =>'web'],function(){

    Route::get('/', function () {
        return view('welcome');
    });

    // show all buildings to users
    Route::get('/showAllBuildings','BuildingController@showAllEnable');
    Route::get('/ForRent','BuildingController@ForRent');
    Route::get('/ForBuy','BuildingController@ForBuy');
    Route::get('/type/{type}','BuildingController@showByType');
    Route::get('/search','BuildingController@search');
    Route::get('/SingleBuilding/{id}','BuildingController@showSingle');
    Route::get('/ajax/bu/information','BuildingController@getAjaxInfo');


//    contacts
    Route::get('/contact', 'HomeController@contact');
    Route::post('/contact', 'ContactController@store');





    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    

});
