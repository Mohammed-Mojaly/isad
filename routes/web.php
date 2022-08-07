<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', function () {
    return redirect()->to('user/dashboard');
});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'auth','verified','userrole'
])->prefix('user')->group(function () {



    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/update-primary-data',                         [Controllers\BeneficiaryController::class, 'get_user_data'])->name('user.update_primary_data');
    Route::post('/update-primary-data',                         [Controllers\BeneficiaryController::class, 'edit_primary_data'])->name('user.edit_primary_data');

    Route::get('/update-housing-info',                         [Controllers\BeneficiaryController::class, 'get_housing_info'])->name('user.update_housing_info');
    Route::post('/update-housing-info',                         [Controllers\BeneficiaryController::class, 'edit_housing_info'])->name('user.edit_housing_info');

});


/// admins
Route::middleware([config('jetstream.auth_session'),'auth','verified','roles'
])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
       return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::get('user/d/{id}', [Controllers\UserAdminController::class, 'del_user'])->name('users.del');

    Route::resource('users',                       Controllers\UserAdminController::class);

    Route::resource('roles',                       Controllers\RoleController::class);

    Route::get('/userdata', [Controllers\UserAdminController::class, 'userdata'])->name('admin.users_data');
    // Route::get('/update-primary-data',                         [Controllers\BeneficiaryController::class, 'get_user_data'])->name('user.update_primary_data');
    // Route::post('/update-primary-data',                         [Controllers\BeneficiaryController::class, 'edit_primary_data'])->name('user.edit_primary_data');
//
    // Route::get('/update-housing-info',                         [Controllers\BeneficiaryController::class, 'get_housing_info'])->name('user.update_housing_info');
    // Route::post('/update-housing-info',                         [Controllers\BeneficiaryController::class, 'edit_housing_info'])->name('user.edit_housing_info');

});
