<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\userController;
use App\Http\Controllers\API\PaiementController;
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

// Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//     ->middleware(['signed', 'throttle:6,1'])
//     ->name('verification.verify');

// // Resend link to verify email
// Route::post('/email/verify/resend', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth:api', 'throttle:6,1'])->name('verification.send');

// ---------------------------------------------------------ControllerPaiement---------------------------------
// Route::apiResource('paiements', PaiementController::class);
// Route::apiResource('show', PaiementController::class);

Route::get('/paiements', [PaiementController::class, 'index']);
Route::get('/paiements/{paiement}', [PaiementController::class, 'show']);
Route::post('/paiements', [PaiementController::class, 'store']);
Route::put('/paiements/{paiement}', [PaiementController::class, 'update']);
Route::delete('/paiements/{paiement}', [PaiementController::class, 'destroy']);

// Route::apiResource('storemc', PaiementController::class);
// Route::apiResource('updatemc', PaiementController::class);
// Route::apiResource('destroymc', PaiementController::class);
// ---------------------------------------------------------UserController---------------------------------
Route::apiResource('users', UserController::class);
Route::apiResource('show', UserController::class);
// Route::get('/show{id}', UserController::class . '@show');
// Route::get('/{user}', 'UserController@show'); 

Route::apiResource('store', UserController::class);
Route::apiResource('update', UserController::class);
Route::apiResource('destroy', UserController::class);
// ---------------------------------------------------------AuthController---------------------------------
Route::post('loginapi', [AuthController::class, 'signin']);
Route::post('registerapi', [AuthController::class, 'signup']);
// ---------------------------------------------------------middleware---------------------------------
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/me', 'AuthController@me');
// });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'auth','middleware' => ['auth:sanctum']], function(){
  Route::get('/logout', [AuthController::class,'logout']);
  Route::get('/', [UserController::class,'index']);
});