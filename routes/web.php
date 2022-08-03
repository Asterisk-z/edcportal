<?php

use App\Http\Controllers\Admin\DashbaordController;
use App\Http\Controllers\Admin\FacultyManagement;
use App\Http\Controllers\Admin\StudentManagementController;
use App\Http\Controllers\Admin\FeeManagement;
use App\Http\Controllers\Admin\LibraryManagementContoller;
use App\Http\Controllers\Admin\SchoolManagement;
use App\Http\Controllers\Student\Dashboard;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WebsiteController;
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

Route::get('/', [WebsiteController::class, 'index'])->name('web.home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'admin'])->prefix('admin/')->name('admin.')->group( function() {

    Route::get('dashboard', [DashbaordController::class, 'index'])->name('dashboard');

    Route::get('students', [StudentManagementController::class, 'index'])->name('students');

    Route::get('students/registration', [StudentManagementController::class, 'registration']);
    Route::post('students/verify/payment', [StudentManagementController::class, 'verifyPayment']);
    Route::post('students/register', [StudentManagementController::class, 'register']);


    Route::get('settings', [SettingController::class, 'index'])->name('setting');
    Route::post('settings/create', [SettingController::class, 'store'])->name('setting.store');
    Route::post('settings/update', [SettingController::class, 'update'])->name('setting.update');
    Route::post('settings/delete', [SettingController::class, 'destroy'])->name('setting.delete');
    Route::post('settings/searchById/{id}', [SettingController::class, 'show'])->name('setting.searchById');
    Route::post('settings/searchByName/{name}', [SettingController::class, 'getByName'])->name('setting.searchByName');





    Route::get('student-management/add', [StudentManagementController::class, 'addStudent'])->name('student.add');
    Route::post('student-management/store', [StudentManagementController::class, 'storeStudent'])->name('student.store');
    Route::get('student-management/{student}/display/{registration}', [StudentManagementController::class, 'getStudent'])->name('student.get');


    Route::get('fee-management', [FeeManagement::class, 'index'])->name('fee');

    Route::get('library-management', [LibraryManagementContoller::class, 'index'])->name('library');

    Route::get('school-management', [SchoolManagement::class, 'index'])->name('school');

    Route::get('faculty-management', [FacultyManagement::class, 'index'])->name('faculty');
    Route::post('faculty-management/add', [FacultyManagement::class, 'add'])->name('faculty.add');

});

Route::middleware(['auth', 'student'])->prefix('student/')->name('student.')->group( function() {
    Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard');
});




Route::get('departments/{faculty_id}', [DepartmentController::class, 'listByFaculty']);
