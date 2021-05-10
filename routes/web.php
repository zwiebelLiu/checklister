<?php

use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\ChecklistGroupController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TasksController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){

    Route::get('welcome',[PagesController::class,'welcome'])->name('welcome');
    Route::get('consultation',[PagesController::class,'consultation'])->name('consultation');
   Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'is_admin'],function()
   {
       Route::get('users',[UserController::class,'index'])->name('userlist');
       Route::resource('pages', PageController::class)->only(['edit','update']);
       Route::resource('checklist_group', ChecklistGroupController::class);
       Route::resource('checklist_group.checklists', ChecklistController::class);
       Route::resource('checklists.tasks', TasksController::class);

   }
   );
});

