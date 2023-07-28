<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PaperController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\SectionBooksController;
use App\Http\Controllers\Api\DepartmentPapersController;
use App\Http\Controllers\Api\DepartmentSectionsController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('users', UserController::class);

        Route::apiResource('departments', DepartmentController::class);

        // Department Sections
        Route::get('/departments/{department}/sections', [
            DepartmentSectionsController::class,
            'index',
        ])->name('departments.sections.index');
        Route::post('/departments/{department}/sections', [
            DepartmentSectionsController::class,
            'store',
        ])->name('departments.sections.store');

        // Department Papers
        Route::get('/departments/{department}/papers', [
            DepartmentPapersController::class,
            'index',
        ])->name('departments.papers.index');
        Route::post('/departments/{department}/papers', [
            DepartmentPapersController::class,
            'store',
        ])->name('departments.papers.store');

        Route::apiResource('sections', SectionController::class);

        // Section Books
        Route::get('/sections/{section}/books', [
            SectionBooksController::class,
            'index',
        ])->name('sections.books.index');
        Route::post('/sections/{section}/books', [
            SectionBooksController::class,
            'store',
        ])->name('sections.books.store');

        Route::apiResource('papers', PaperController::class);

        Route::apiResource('books', BookController::class);
    });
