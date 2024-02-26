<?php

use App\Http\Controllers\AuthenController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\AproposController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['guest'])->group(function(){
    // inscription 
    Route::get('/inscription', [AuthenController::class, 'inscription']);
    Route::post('/singup', [AuthenController::class, 'store']);
    
    // connexion 
    Route::get('/connexion', [AuthenController::class, 'connexion']);
    Route::post('/singin', [AuthenController::class, 'singIn'])->name('login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/accueil', [AuthenController::class, 'accueil']);
    Route::get('/blog', [AuthenController::class, 'blog']);
    Route::get('/logout', [AuthenController::class, 'logout']);
    Route::get('/gestion', [AuthenController::class, 'gestion']);
    Route::post('/projet', [AuthenController::class, 'storeProjet']);
    Route::delete('/deleteprojet/{projet}', [AuthenController::class, 'deleteProjet']);
    Route::get('/showedit/{projet}', [AuthenController::class, 'showEdit']);
    Route::put('/update/{projet}', [AuthenController::class, 'update']);
    Route::get('/apropos', [AuthenController::class, 'apropos']);
    Route::get('/showperso/{personne}', [AuthenController::class, 'showperso']);
    Route::put('/updatestore/{personne}',[AuthenController::class, 'updatestore']);
    Route::put('/updatemail/{personne}',[AuthenController::class, 'updatemail']);
    Route::get('/conversation', [ConversationController::class, 'index']);
    Route::get('/conversation/{user}', [ConversationController::class, 'show'])->name('conversation.show');
    Route::post('/conversation/{user}', [ConversationController::class, 'store']);
    Route::post('/aproposperso', [AproposController::class, 'storeApropos']);
    // Route::get('/apropos/{personnel}', [AproposController::class, 'getApropos']);
});

