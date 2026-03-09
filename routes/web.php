<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Project Features:
// :-Admin can add MCQ for any topics
// :-User can create account
// :-User Attempt quiz
// :-And attempt quiz will be stores
// :-So user can any previous attempted quiz
// :- User can share score with social media sites 
// :-Admin can check u7ser details 

//DATABASE STRUCTURE
//:-MYSQL
// :-Admin table :multiple admin with access
// :-category :queries categories [topins like java [category its programming]]
// :-Topic:like java ,php,css etc.
// :-quiz 
// :-User :total attended users
// :-Result


//quiz system
Route::view('admin-login','admin-login');
//admin login 
Route::post('admin-login',[adminController::class,'adminlogin']);
Route::get('dashboard',[adminController::class,'dashboard']);
Route::get('admin-categories',[adminController::class,'categories']);
Route::get('admin-logout',[adminController::class,'logout']);
//add category
Route::post('add-category',[adminController::class,'addCategory']);
//delete category
Route::get('category/delete/{id}',[adminController::class,'deleteCategory']);
//add quiz
Route::get('add-quiz',[adminController::class,'addQuiz']);
//add mcqs
Route::post('add-mcq',[adminController::class,'addMCQs']);
//end quiz
Route::get('end-quiz',[adminController::class,'endQuiz']);
//show quiz
Route::get('show-quiz/{id}/{quizName}',[adminController::class,'showQuiz']);
//view quiz list
Route::get('quiz-list/{id}/{category}',[adminController::class,'quizList']);



//Functionality For users
Route::get('/',[UserController::class,'welcome']);
//view category question list
Route::get('user-quiz-list/{id}/{category}',[UserController::class,'userQuizList']);
//start[attempt quiz]
Route::get('start-quiz/{id}/{name}',[UserController::class,'startQuiz']);
//User Signup
Route::view('user-signup','user-signup');
Route::post('user-signup',[UserController::class,'userSignup']);