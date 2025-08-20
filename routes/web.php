<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    if (userLogged()) {
        return redirect()->route('dashboard');
    }
    return view('index');
});
Route::get('/register', fn() => view("register"));
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::middleware('check.user.session')->prefix('user')->group(function () {

    Route::get("/logout", function () {
        Session::flush();
        return redirect('/');
    });
    Route::get("/dashboard", [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('users')->group(function () {
        Route::get('/', fn() => view("user.users"));
        Route::get('/data', [UserController::class, 'data'])->name('users.data');
        Route::get('/withhr', [UserController::class, 'withhr'])->name('users.withhr');
        Route::get('/{id}', [UserController::class, 'get']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'delete']);
    });

    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index']);
        Route::post('/add', [ProjectController::class, 'create']);
        Route::get('/all', [ProjectController::class, 'getall'])->name('projects.getall');
        Route::get('/withhr', [ProjectController::class, 'withhr'])->name('projects.withhr');
        Route::get('/withhr/user', [ProjectController::class, 'withhrUsr'])->name('projects.withhrUsr');
        Route::get('/{id}', [ProjectController::class, 'get']);
        Route::post('/{id}', [ProjectController::class, 'update']);
        Route::delete('/{id}', [ProjectController::class, 'delete']);
        Route::get('/{id}/users', [ProjectController::class, 'users']);
    });

    Route::prefix('tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index']);
        Route::post('/add', [TaskController::class, 'create']);
        Route::post('/updateOrder', [TaskController::class, 'updateOrder'])->name('tasks.updateOrder');
        Route::get('/all', [TaskController::class, 'getall'])->name('tasks.getall');
        Route::get('/{id}', [TaskController::class, 'get']);
        Route::post('/{id}', [TaskController::class, 'update']);
        Route::delete('/{id}', [TaskController::class, 'delete']);
    });

    Route::prefix('jobs')->group(function () {
        Route::get('/', [JobController::class, 'index']);
        Route::post('/{id}', [JobController::class, 'update']);
    });

    Route::prefix('comments')->group(function () {
        Route::post('/getall', [CommentController::class, 'getall']);
        Route::post('/add', [CommentController::class, 'add']);
    });
});
