<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController; //Authentication path
use App\Http\Controllers\CandidateController; //Candidate path
use App\Http\Controllers\VoterController; //Voter path
use App\Http\Controllers\PositionController; //Position path
use App\Http\Controllers\ElectionController; //Election path
use App\Http\Controllers\MessageController; //Election path

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
    return view('landing');
});

Route::get('login',[CustomAuthController::class,'login'])->name('login')->middleware('alreadyLoggedIn');
Route::get('register',[CustomAuthController::class,'register'])->name('register')->middleware('alreadyLoggedIn');
Route::post('register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('dashboard',[CustomAuthController::class,'dashboard'])->name('user.home')->middleware('isLoggedIn','voted');
Route::get('admin/home',[CustomAuthController::class,'adminHome'])->name('admin.home')->middleware('isLoggedIn','is_admin');
Route::get('logout',[CustomAuthController::class,'logout'])->name('logout');

Route::middleware('is_admin','isLoggedIn')->group(function(){
    Route::controller(CandidateController::class)->prefix('candidates')->group(function(){
        Route::get('','index')->name('candidates');
        Route::get('add','add')->name('candidates.add');
        Route::post('save','save')->name('candidates.save');
        Route::get('edit/{id}','edit')->name('candidates.edit');
        Route::post('edit/{id}','update')->name('candidates.update');
        Route::get('delete/{id}','delete')->name('candidates.delete');
        Route::get('show/{id}','show')->name('candidates.show');
    });
    
    Route::controller(VoterController::class)->prefix('voters')->group(function(){
        Route::get('','index')->name('voters');
        Route::get('add','add')->name('voters.add');
        Route::post('save','save')->name('voters.save');
        Route::get('edit/{id}','edit')->name('voters.edit');
        Route::post('edit/{id}','update')->name('voters.update');
        Route::get('delete/{id}','delete')->name('voters.delete');
    });
    
    Route::controller(PositionController::class)->prefix('positions')->group(function(){
        Route::get('','index')->name('positions');
        Route::get('add','add')->name('positions.add');
        Route::post('save','save')->name('positions.save');
        Route::get('edit/{id}','edit')->name('positions.edit');
        Route::post('edit/{id}','update')->name('positions.update');
        Route::get('delete/{id}','delete')->name('positions.delete');
    });

    Route::controller(ElectionController::class)->group(function(){
        Route::get('title','addTitle')->name('title');
        Route::post('updateTitle','updateTitle')->name('updateTitle');
        Route::get('ballot','ballot')->name('ballot');
        Route::get('votes','votes')->name('votes');
    });
});

Route::middleware('isLoggedIn')->group(function(){
    Route::post('submit',[ElectionController::class,'submitVote'])->name('submit');
    Route::get('delete',[ElectionController::class,'deleteVote'])->name('delete');
    Route::get('submitted',[ElectionController::class,'submitpage'])->name('submitted');
    Route::get('platform/{id}',[ElectionController::class,'platform'])->name('platform');
    Route::get('messages',[MessageController::class,'getMessage'])->name('messages');
    Route::get('delete/{id}',[MessageController::class,'delete'])->name('message.delete');
});

Route::post('message',[MessageController::class,'submitMessage'])->name('message');