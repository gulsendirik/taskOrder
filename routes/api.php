<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Tüm görevleri gösterme (Get all task)
Route::get('/getall', 'TaskController@index');

// Görev oluşturma (create a task)
Route::post('/tasks', 'TaskController@store');

//Göreve ön koşul ekleme (Add prerequisites to a task)
Route::post('/add/prerequisites', 'TaskController@addPrerequisites');

//Görevleri yapılma sırasına göre sıralama (Order the tasks)
Route::post('/completed/tasks', 'TaskController@completedTasks');
