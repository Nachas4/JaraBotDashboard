<?php

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
    try {
        $all = DB::table($table)
            ->where($field, $value)
            ->get();
        
        return response()->json($all);
    } catch (\Throwable $th) {
        return response()->json($th->getMessage(), 500);
    }
});

Route::get('getOne/{table}/{field}/{value}/{getField}', function ($table, $field, $value, $getField) {
    try {
        $one = DB::table($table)
            ->where($field, $value)
            ->get($getField);

        return response()->json($one);
    } catch (\Throwable $th) {
        return response()->json($th->getMessage(), 500);
    }
});
