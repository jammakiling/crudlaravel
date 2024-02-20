<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
   // $tasks = Task::where('user_id', auth()->id())->get();
   $tasks = [];
   if(auth()->check()){
    $tasks = auth()->user()->existingtask()->latest()->get();
   }
 
    return view('home',['tasks' => $tasks]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/create_task', [TaskController::class,'createTask']);
Route::get('/edit-task/{task}',[TaskController::class, 'showEditScreen']);
Route::put('/edit-task/{task}',[TaskController::class, 'updateTask']);
Route::delete('/delete-task/{task}',[TaskController::class, 'deleteTask']);