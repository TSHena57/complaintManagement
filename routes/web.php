<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\RoleController;

Auth::routes(['verify' => true]);
Route::get('/run-migrate-seed', function () {
    // Run migrate
    Artisan::call('migrate', [
        '--force' => true,
    ]);

    // Run seed
    Artisan::call('db:seed', [
        '--force' => true,
    ]);

    return "Migrate & Seed completed!";
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/complaints', [HomeController::class, 'complaints'])->name('complaints');
Route::get('/complaints/{id}', [HomeController::class, 'complaint_details'])->name('complaint_details');
Route::get('/complaints-print/{id}', [HomeController::class, 'complaint_details_print'])->name('complaint_details_print');

Route::middleware(['auth', 'verified'])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin_home');
   
    Route::get('/change-password', [HomeController::class, 'change_password'])->name('change_password');
    Route::post('/update-change-password', [HomeController::class, 'update_change_password'])->name('update_change_password');

    Route::controller(UserController::class)->prefix('/users')->group(function () {
        Route::get('/index', 'index')->name('user.index');
        Route::post('/store', 'store')->name('user.store');
        Route::get('/edit/{id}', 'edit')->name('user.edit');
        Route::post('/update/{id}', 'update')->name('user.update');
        Route::post('/delete', 'destroy')->name('user.delete');
        Route::get('/select-list-ajax', 'list_for_select_ajax')->name('user.list_for_select_ajax');
        Route::get('/select-list-ajax-based-on-classification', 'list_for_select_ajax_based_on_classification')->name('user.list_for_select_ajax_based_on_classification');

    });

    Route::controller(ComplaintController::class)->prefix('/complaint')->group(function () {
        Route::get('/my-index', 'my_index')->name('complaint.my-index');
        Route::get('/all', 'index')->name('complaint.index');
        Route::get('/create', 'create')->name('complaint.create');
        Route::post('/store', 'store')->name('complaint.store');
        Route::get('/show/{id}', 'show')->name('complaint.show');
        Route::get('/edit/{id}', 'edit')->name('complaint.edit');
        Route::post('/update/{id}', 'update')->name('complaint.update');
        Route::post('/reply/{id}', 'reply')->name('complaint.reply');
        Route::post('/delete', 'destroy')->name('complaint.delete');
    });
});
Route::controller(RoleController::class)->prefix('user-management')->middleware(['auth'])
    ->group( function($route){
        $route->get('role-assign-to-users', 'users')->name('user-management.user-index');
        $route->get('role-index', 'index')->name('user-management.role-index');
        $route->get('role-edit/{id}', 'editRole')->name('user-management.role-edit');
        $route->post('role-update/{id}', 'updateRole')->name('user-management.role-update');
        $route->post('role-assign', 'role_assign')->name('user-management.role-assign');
        $route->post('role-store', 'store')->name('user-management.role-store');

        $route->get('permission-index/{id}', 'permission_index')->name('user-management.permission-index');
        $route->post('permission-store', 'permission_store')->name('user-management.permission-store');
});
