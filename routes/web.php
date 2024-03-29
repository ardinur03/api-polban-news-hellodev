<?php

use App\Http\Controllers\{AdminController, AdminRegisterOptionController, CampusOrganizationController, CategoryController, FacultyOrganizationController, HomeController, LogController, ProfileController, NewController, NewGalleryController, SuperAdminController};
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

Route::middleware('splade')->group(function () {
    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware(['auth', 'role:admin-pusat|admin-himpunan|super-admin'])->group(function () {
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('dashboard', [AdminController::class, 'index'])->middleware(['verified'])->name('dashboard');
            Route::resource('news', NewController::class)->except(['show']);
            Route::resource('news.gallery', NewGalleryController::class)->shallow()->except(['show']);
        });
    });

    Route::prefix('super-admin')->middleware(['auth', 'role:super-admin'])->name('super-admin.')->group(function () {
        Route::get('dashboard', [SuperAdminController::class, 'index'])->name('dashboard');
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('campus-organizations', CampusOrganizationController::class)->except(['show']);
        Route::resource('faculty-organizations', FacultyOrganizationController::class)->except(['show']);
        Route::get('logs', [LogController::class, 'index'])->name('logs');
        Route::get('logs-show/{id}', [LogController::class, 'show'])->name('logs.show');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['auth', 'user.register'])->group(function () {
        Route::get('option-user-admin', [AdminRegisterOptionController::class, 'optionUserAdmin'])->name('option-user-admin');
        Route::post('option-user-campus-admin', [AdminRegisterOptionController::class, 'optionUserAdminCampusStore'])->name('option-user-admin-campus.store');
        Route::post('option-user-association-admin', [AdminRegisterOptionController::class, 'optionUserAdminAssociationStore'])->name('option-user-admin-association.store');
    });

    require __DIR__ . '/auth.php';
});
