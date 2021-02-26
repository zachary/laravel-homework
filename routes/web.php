<?php
// use Yajra\DataTables\DataTables;
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

Route::get("/", function () {
    return view("welcome");
});

Auth::routes();

Route::get("/home", "HomeController@index")->name("home");
Route::get("logout", "\App\Http\Controllers\Auth\LoginController@logout");
Auth::routes();

Route::get("/home", "HomeController@index")->name("home");
Route::get("employee/{id}/edit", "EmployeesController@edit")->middleware(
    "auth"
);
Route::post("employee/store", "EmployeesController@store")->middleware("auth");
Route::get("employee/delete/{id}", "EmployeesController@destroy")->middleware(
    "auth"
);
// Route::get("employees", "EmployeesController@index")->name("employees.index");
Route::get("employees", "EmployeesController@index")
    ->name("employees")
    ->middleware("auth");
Route::get("get-employee-data", "EmployeesController@dtindex")
    ->name("datatables.employees")
    ->middleware("auth");
// Route::get("/employees", function (DataTables $dt) {
// $model = App\Employee::query();
// return $dt->eloquent($model)->toJson();
// });
Route::get("/test", "EmployeesController@test");
