<?php

use App\Http\Controllers\Api\CategoryPostController;
use App\Http\Controllers\Api\LeaveController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserContractController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserMonthlyPaymentController;
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

    // Read All Articles
    Route::get('/readAll/post', [PostController::class, 'ReadAllPost']);
     // Create User
     Route::post('/Register', [UserController::class, 'RegisterUser']);

// Connecter un User
Route::post('/Login', [UserController::class, 'LoginUser']);

Route::middleware('auth:sanctum')->group(function () {

                    // ******* Section Article *******
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
    // Create une categorie
    Route::post('/create/categoryPost', [CategoryPostController::class, 'CreateCategory']);
    // Update une categorie
    Route::put('/update/categoryPost/{categoryPost}', [CategoryPostController::class, 'UpdateCategory']);
    // Delete une categorie
    Route::delete('/delete/categoryPost/{categoryPost}', [CategoryPostController::class, 'DeleteCategory']);

                // ******* Section Leave *******
    // Read All Leaves
    Route::get('/readAll/leave', [LeaveController::class, 'ReadAllLeave']);
    // Read une Leave
    Route::get('/read/leave/{leave}', [LeaveController::class, 'ReadLeave']);
    // Create un Article
    Route::post('/create/leave', [LeaveController::class, 'CreateLeave']);
    // Update un Article
    Route::put('/update/leave/{leave}', [LeaveController::class, 'UpdateLeave']);
    // Delete un Article
    Route::delete('/delete/leave/{leave}', [LeaveController::class, 'DeleteLeave']);

                // ******* Section Contract *******
    // Read All Contracts
    Route::get('/readAll/contract', [UserContractController::class, 'ReadAllContract']);
    // Read un Contract
    Route::get('/read/contract/{contract}', [UserContractController::class, 'ReadContract']);
    // Create un Contract
    Route::post('/create/contract', [UserContractController::class, 'CreateContract']);
    // Update un Contract
    Route::put('/update/contract/{contract}', [UserContractController::class, 'UpdateContract']);
    // Delete un Contract
    Route::delete('/delete/contract/{contract}', [UserContractController::class, 'DeleteContract']);

                // ******* Section Payment *******
    // Read All Payments
    Route::get('/readAll/payment', [UserMonthlyPaymentController::class, 'ReadAllPayment']);
    // Read un Payment
    Route::get('/read/payment/{payment}', [UserMonthlyPaymentController::class, 'ReadPayment']);
    // Create un Payment
    Route::post('/create/payment', [UserMonthlyPaymentController::class, 'CreateContract']);
    // Update un Payment
    Route::put('/update/payment/{payment}', [UserMonthlyPaymentController::class, 'UpdateContract']);
    // Delete un Payment
    Route::delete('/delete/payment/{payment}', [UserMonthlyPaymentController::class, 'DeleteContract']);

                    // ******* Section Utilisateur *******
   
    // Read user with all posts created
    Route::get('/read/userAllPostCreate/{user}', [UserController::class, 'getPostsByUserId']);
    // Read user with all leaves created
    Route::get('/read/userAllLeaveCreate/{user}', [UserController::class, 'getLeavesByUserId']);
    // Read user with all contracts created
    Route::get('/read/userAllContractCreate/{user}', [UserController::class, 'getContractssByUserId']);
    // Read user with all payments created
    Route::get('/read/userAllPaymentCreate/{user}', [UserController::class, 'getPaymentsByUserId']);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
