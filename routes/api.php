<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Models
use App\Models\User;

//Controllers
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\PasswordResetController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RoleController;

use App\Http\Controllers\Item\CategoryController;
use App\Http\Controllers\Item\BrandController;
use App\Http\Controllers\Item\UnitController;
use App\Http\Controllers\Item\SupplierController;
use App\Http\Controllers\Item\ItemController;

use App\Http\Controllers\Home\HomeItemController;
use App\Http\Controllers\Home\HomeImageController;

use App\Http\Controllers\Order\OrderController;

use App\Http\Controllers\System\ConfigurationController;
use App\Http\Controllers\System\ActivityLogController;

Route::middleware('auth:sanctum','verified')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::post('/registerCustomer', [AuthController::class, 'registerCustomer']);
Route::post('/loginCustomer', [AuthController::class, 'loginCustomer']);
Route::post('/loginAdmin', [AuthController::class, 'loginAdmin']);
Route::post('/forgot-password', [PasswordResetController::class, 'forgotPassword']);
Route::post('/reset-password', [PasswordResetController::class, 'reset']);

//Homepage Items
Route::get('/featuredItems', [HomeItemController::class, 'featuredItems']);
Route::get('/popularItems', [HomeItemController::class, 'popularItems']);
Route::get('/latestItems', [HomeItemController::class, 'latestItems']);
Route::get('/discountedItems', [HomeItemController::class, 'discountedItems']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //Auth
    Route::post('/registerAdmin', [AuthController::class, 'registerAdmin']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail']);
    Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
    
    // Users
    Route::get('/userList', [UserController::class, 'userList']);
    Route::get('/userGetById/{id}', [UserController::class, 'userGetById']);
    Route::put('/userUpdate/{id}', [UserController::class, 'userUpdate']);
    Route::delete('/userDelete/{id}', [UserController::class, 'userDelete']);
    Route::get('/userProfileView/{id}', [UserController::class, 'userProfileView']);

    // Profile
    Route::post('/userProfileCreate', [ProfileController::class, 'userProfileCreate']);
    Route::get('/userProfileGetById/{id}', [ProfileController::class, 'userProfileGetById']);
    Route::put('/userProfileUpdate/{id}', [ProfileController::class, 'userProfileUpdate']);
    Route::delete('/userProfileDelete/{id}', [ProfileController::class, 'userProfileDelete']);
    
    //Profile Settings
    Route::post('/profileSettingPhotoUpdate', [ProfileController::class, 'profileSettingPhotoUpdate']);
    Route::post('/profileSettingPasswordUpdate', [ProfileController::class,'profileSettingPasswordUpdate']);
    
    //Roles
    Route::get('/roleList', [RoleController::class, 'roleList']);
    Route::get('/roleGetById/{id}', [RoleController::class, 'roleGetById']);
    Route::post('/roleCreate', [RoleController::class, 'roleCreate']);
    Route::put('/roleUpdate/{id}', [RoleController::class, 'roleUpdate']);
    Route::delete('/roleDelete/{id}', [RoleController::class, 'roleDelete']);

    //Category
    Route::get('/categoryList', [CategoryController::class, 'categoryList']);
    Route::get('/categoryGetById/{id}', [CategoryController::class, 'categoryGetById']);
    Route::post('/categoryCreate', [CategoryController::class, 'categoryCreate']);
    Route::put('/categoryUpdate/{id}', [CategoryController::class, 'categoryUpdate']);
    Route::delete('/categoryDelete/{id}', [CategoryController::class, 'categoryDelete']);

    //Brand
    Route::get('/brandList', [BrandController::class, 'brandList']);
    Route::get('/brandGetById/{id}', [BrandController::class, 'brandGetById']);
    Route::post('/brandCreate', [BrandController::class, 'brandCreate']);
    Route::put('/brandUpdate/{id}', [BrandController::class, 'brandUpdate']);
    Route::delete('/brandDelete/{id}', [BrandController::class, 'brandDelete']);

    //unit
    Route::get('/unitList', [UnitController::class, 'unitList']);
    Route::get('/unitGetById/{id}', [UnitController::class, 'unitGetById']);
    Route::post('/unitCreate', [UnitController::class, 'unitCreate']);
    Route::put('/unitUpdate/{id}', [UnitController::class, 'unitUpdate']);
    Route::delete('/unitDelete/{id}', [UnitController::class, 'unitDelete']);

    //supplier
    Route::get('/supplierList', [SupplierController::class, 'supplierList']);
    Route::get('/supplierGetById/{id}', [SupplierController::class, 'supplierGetById']);
    Route::post('/supplierCreate', [SupplierController::class, 'supplierCreate']);
    Route::put('/supplierUpdate/{id}', [SupplierController::class, 'supplierUpdate']);
    Route::delete('/supplierDelete/{id}', [SupplierController::class, 'supplierDelete']);

    //item
    Route::get('/itemList', [ItemController::class, 'itemList']);
    Route::get('/itemGetById/{id}', [ItemController::class, 'itemGetById']);
    Route::post('/itemCreate', [ItemController::class, 'itemCreate']);
    Route::put('/itemUpdate/{id}', [ItemController::class, 'itemUpdate']);
    Route::delete('/itemDelete/{id}', [ItemController::class, 'itemDelete']);

    Route::post('/orderCreate', [OrderController::class, 'orderCreate']);

    //Configuration
    Route::get('/config', [ConfigurationController::class, 'config']);
    Route::put('/configUpdate', [ConfigurationController::class, 'configUpdate']);
    Route::get('/logList', [ActivityLogController::class, 'logList']);
});