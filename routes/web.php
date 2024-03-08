<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// returns all listings
Route::get('/', [ListingController::class, 'index']);

// show create listing form
Route::get('/listings/create', [ListingController::class, 'create']);

// store new listing
Route::post('/listings', [ListingController::class, 'store']);

// show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// show register form
Route::get('/register', [UserController::class, 'create']);

// create new user
Route::post('/users', [UserController::class, 'store']);

// log out
Route::post('/logout', [UserController::class, 'logout']);

// log in form
Route::get('/login', [UserController::class, 'login']);

// log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



// returns a single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);