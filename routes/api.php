<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserStatusController;

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

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

    Route::get('/get-patients', [PatientController::class, 'getPatients']);
    Route::post('/add-patient', [PatientController::class, 'addPatient']);
    Route::put('/edit-patient/{id}', [PatientController::class, 'editPatient']);
    Route::delete('/delete-patient/{id}', [PatientController::class, 'deletePatient']);

    Route::get('/get-diagnosis', [DiagnoseController::class, 'getDiagnosis']);
    Route::post('/add-diagnose', [DiagnoseController::class, 'addDiagnose']);
    Route::put('/edit-diagnose/{id}', [DiagnoseController::class, 'editDiagnose']);
    Route::delete('/delete-diagnose/{id}', [DiagnoseController::class, 'deleteDiagnose']);

    Route::get('/get-specialists', [SpecialistController::class, 'getSpecialists']);
    Route::post('/add-specialist', [SpecialistController::class, 'addSpecialist']);
    Route::put('/edit-specialist/{id}', [SpecialistController::class, 'editSpecialist']);
    Route::delete('/delete-specialist/{id}', [SpecialistController::class, 'deleteSpecialist']);
   
    Route::get('/get-roles', [RoleController::class, 'getRoles']);
    Route::post('/add-role', [RoleController::class, 'addRole']);
    Route::put('/edit-role/{id}', [RoleController::class, 'editRole']);
    Route::delete('/delete-role/{id}', [RoleController::class, 'deleteRole']);
    
    Route::get('/get-userstatuses', [UserStatusController::class, 'getUserStatuses']);
    Route::post('/add-userstatus', [UserStatusController::class, 'addUserStatus']);
    Route::put('/edit-userstatus/{id}', [UserStatusController::class, 'editUserStatus']);
    Route::delete('/delete-userstatus/{id}', [UserStatusController::class, 'deleteUserStatus']); 

    
    

    Route::post('/logout', [AuthenticationController::class, 'logout']);
});