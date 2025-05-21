<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Hotel;
use App\Models\Transport;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/serviceables', function (Request $request) {
    $type = $request->query('type');
    if (!in_array($type, [Hotel::class, Transport::class])) {
        return response()->json([]);
    }
    return app($type)->select(['id', 'name'])->get();
});
