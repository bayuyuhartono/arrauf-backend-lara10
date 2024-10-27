<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CmsController;
use App\Http\Controllers\API\BlogController;

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

Route::get('/', function () {
    $response['success'] = true;
    $response['message'] = 'Welcome to arrauf API';

    return $response;
});

Route::controller(CmsController::class)->group(function(){
    Route::get('cms/home', 'home');
    Route::get('cms/contact', 'contact');
    Route::get('cms/ppdb', 'ppdb');
});

Route::controller(BlogController::class)->group(function(){
    Route::get('blog/page/{id}', 'page');
    Route::get('blog/news', 'newsLists');
    Route::get('blog/news/{slug}', 'news');
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
