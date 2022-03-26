<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\deptcontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("student/get",[studentController::class,"getstudents"]);
Route::post("student/add",[studentController::class,"addstudent"]);
Route::post("student/del",[studentController::class,"studentdel"]);
Route::post("student/update",[studentController::class,"studentupdate"]);

Route::get("dept/get",[deptcontroller::class,"getdepts"]);
Route::post("dept/add",[deptcontroller::class,"adddept"]);
Route::post("dept/del",[deptcontroller::class,"deptdel"]);
Route::post("dept/update",[deptcontroller::class,"deptupdate"]);

Route::post("dept/details",[deptcontroller::class,"deptdetails"]);