<?php

use App\Models\AutoRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getAll/{table}/{field}/{value}', function ($table, $field, $value) {
    $all = DB::table($table)
        ->where($field, $value)
        ->get();

    return response()->json($all);
});

Route::get('getOne/{table}/{field}/{value}/{getField}', function ($table, $field, $value, $getField) {
    $one = DB::table($table)
        ->where($field, $value)
        ->get($getField);
        
    return response()->json($one);
});
