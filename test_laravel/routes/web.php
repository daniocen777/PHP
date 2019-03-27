<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->prefix('admin')->group(function() {
    // person
    Route::get('/person', 'PersonController@index'); // page
    Route::get('/person/getData', 'PersonController@getData'); // Datatables
    Route::post('/person', 'PersonController@store'); // crear
    Route::get('/person/removedata', 'PersonController@removeData'); // delete
    Route::get('/person/removeMassive', 'PersonController@removeMassive');
    Route::get('/person/fetchData', 'PersonController@fetchData');
 
    // Employees
    Route::get('/employees', 'EmployeesController@index'); // page
    Route::get('/employees/getData', 'EmployeesController@getData');
    Route::get('/employees/getpeoplecbo', 'EmployeesController@peopleCbo'); // CBO
    Route::post('/employees', 'EmployeesController@storeUpdate'); // create - update
    Route::get('/employees/removedata', 'EmployeesController@removeData'); // delete
});

