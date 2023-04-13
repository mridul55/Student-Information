<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentInfoController;
use App\Http\Controllers\AjaxBOOKCRUDController;
use App\Http\Controllers\Pos\CustomerController;

Route::get('/', function () {
    return redirect('/dashboard');
});
//Admin All Route
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function(){ 
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'Editprofile')->name('edit.profile');
        Route::post('/store/profile', 'Storeprofile')->name('store.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });
});  
  
//Student Information
Route::middleware(['auth'])->group(function () {
    Route::controller(StudentController::class)->group(function(){ 
        Route::get('/student/all', 'StudentAll')->name('student.all');
       // Route::get('/student/add', 'StudentAdd')->name('student.add');
        Route::post('/student/store', 'StudentStore')->name('student.store');
        //Route::get('/student/edit/{id}', 'StudentEdit')->name('student.edit');
        Route::post('/student/update/{id}', 'StudentUpdate')->name('student.update');
        Route::get('/student/delete/{id}', 'StudentDelete')->name('student.delete');
    });
});

// Book
 Route::middleware(['auth'])->group(function () {
     Route::controller(AjaxBOOKCRUDController::class)->group(function(){ 
            Route::get('ajax-book-crud', [AjaxBOOKCRUDController::class, 'index']);
            Route::post('add-update-book', [AjaxBOOKCRUDController::class, 'store']);
            Route::post('edit-book', [AjaxBOOKCRUDController::class, 'edit']);
            Route::post('delete-book', [AjaxBOOKCRUDController::class, 'destroy']);
     });
 });
 
 //Student Info........
 Route::middleware(['auth'])->group(function () {
    Route::controller(StudentInfoController::class)->group(function(){ 
           Route::get('student-information', [StudentInfoController::class, 'index']);
           Route::post('add-update-student', [StudentInfoController::class, 'store']);
           Route::post('view-student', [StudentInfoController::class, 'view']);
           Route::post('edit-student', [StudentInfoController::class, 'edit']);
           Route::post('delete-student', [StudentInfoController::class, 'destroy']);
    });
});
 




Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
