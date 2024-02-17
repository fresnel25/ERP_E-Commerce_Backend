<?php

use App\Http\Controllers\Api\CategoryPostController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
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


// Connecter un User
Route::post('/Login', [UserController::class, 'LoginUser']);


Route::middleware('auth:sanctum')->group(function () {

                    // ******* Section Article *******
    // Read All Articles
    Route::get('/readAll/post', [PostController::class, 'ReadAllPost']);
    // Read un Article
    Route::get('/read/post/{post}', [PostController::class, 'ReadPost']);
    // Create un Article
    Route::post('/create/post', [PostController::class, 'CreatePost']);
    // Update un Article
    Route::put('/update/post/{post}', [PostController::class, 'UpdatePost']);
    // Delete un Article
    Route::delete('/delete/post/{post}', [PostController::class, 'DeletePost']);

                    // ******* Section Categorie *******
    // Read All categories
    Route::get('/readAll/categoryPost', [CategoryPostController::class, 'ReadAllCategory']);
    // Read category with all post
    Route::get('/read/categoryAllPost/{categoryPost}', [CategoryPostController::class, 'getPostsByCategoryId']);
    // Read une categorie
    Route::get('/read/categoryPost/{categoryPost}', [CategoryPostController::class, 'ReadCategory']);
    // Create un Article
    Route::post('/create/categoryPost', [CategoryPostController::class, 'CreateCategory']);
    // Update un Article
    Route::put('/update/categoryPost/{categoryPost}', [CategoryPostController::class, 'UpdateCategory']);
    // Delete un Article
    Route::delete('/delete/categoryPost/{categoryPost}', [CategoryPostController::class, 'DeleteCategory']);

                    // ******* Section Utilisateur *******
    // Inscrire un User
    Route::post('/Register', [UserController::class, 'RegisterUser']);


    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
