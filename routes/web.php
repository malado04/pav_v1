<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ControllerAntenne; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\Auth\LoginController; 
use App\Http\Controllers\HomeContoller;
use App\Http\Controllers\ControllerService;
use App\Http\Controllers\ControllerVehicule;
use App\Http\Controllers\ControllerClients;
use App\Http\Controllers\DouanierController;
use App\Http\Controllers\ImpotController;
use App\Http\Controllers\MineController;
use App\Http\Controllers\ControllerMarque;
use App\Http\Controllers\ControllerModele;
use App\Http\Controllers\ControllerUserUpdate;

use App\Models\Marque;

use App\Models\Modele;
use App\Models\Vehicule; 
use App\Models\Service;  
use App\Models\User;  

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

// Clear application cache:
// Route::get('/clear-cache', function() {
//     Artisan::call('cache:clear');
//     return 'Application cache has been cleared';
// });

// //Clear route cache:
// Route::get('/route-cache', function() {
//     Artisan::call('route:cache');
//     return 'Routes cache has been cleared';
// });

// //Clear config cache:
// Route::get('/config-cache', function() {
//     Artisan::call('config:cache');
//     return 'Config cache has been cleared';
// }); 

// // Clear view cache:
// Route::get('/view-clear', function() {
//     Artisan::call('view:clear');
//     return 'View cache has been cleared';
// });
 

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('clients', ControllerClients::class)
    ->middleware('auth'); 

Route::resource('douniers', DouanierController::class)
    ->middleware('auth'); 

Route::resource('impots', ImpotController::class)
    ->middleware('auth'); 

Route::resource('mines', MineController::class)
    ->middleware('auth'); 
    
Route::resource('users', UserController::class)
    ->middleware('auth'); 

Route::resource('services', ControllerService::class)
    ->middleware('auth'); 

Route::resource('vehicules', ControllerVehicule::class)
    ->middleware('auth');

Route::resource('marques', ControllerMarque::class)
    ->middleware('auth');

Route::resource('modeles', ControllerModele::class)
    ->middleware('auth');

Route::resource('userupdate', ControllerUserUpdate::class)
    ->middleware('auth');

Route::get('home', function() {

        $users = User::All()->count();
        $admin = User::where("admin", 0)->count();
        $chef = User::where("admin", 1)->count();
        $user = Auth::user()->cni;
        $veh = Vehicule::where("fk_client_id", Auth::user()->id)->get();

        if ($user) {
        return view('home', [
            'vehicules' => $veh,
            'users' => $users,
            'admin' => $admin,
            'chef' => $chef,
        ]);

        } else {
        return view('home', [
            'vehicules' => $veh,
            'user' => Auth::user(),
            'users' => $users,
            'admin' => $admin,
            'chef' => $chef,
        ]);

        }
        
})->name('home')->middleware('auth');


Route::get('home_duc', function() {

        $users = User::All()->count();
        $admin = User::where("admin", 0)->count();
        $chef = User::where("admin", 1)->count();
        $user = Auth::user()->cni;
        $veh = Vehicule::all();

        if ($user) {
        return view('home_duc', [
            'vehicules' => $veh,
            'users' => $users,
            'admin' => $admin,
            'chef' => $chef,
        ]);

        } else {
        return view('home_duc', [
            'vehicules' => $veh,
            'user' => Auth::user(),
            'users' => $users,
            'admin' => $admin,
            'chef' => $chef,
        ]);

        }
        
})->name('home_duc')->middleware('auth');


Route::get('home_mine', function() {

        $users = User::All()->count();
        $admin = User::where("admin", 0)->count();
        $chef = User::where("admin", 1)->count();
        $user = Auth::user()->cni;
        $veh = Vehicule::all();

        if ($user) {
        return view('home_mine', [
            'vehicules' => $veh,
            'users' => $users,
            'admin' => $admin,
            'chef' => $chef,
        ]);

        } else {
        return view('home_mine', [
            'vehicules' => $veh,
            'user' => Auth::user(),
            'users' => $users,
            'admin' => $admin,
            'chef' => $chef,
        ]);

        }
        
})->name('home_mine')->middleware('auth');


Route::get('home_impot', function() {

        $users = User::All()->count();
        $admin = User::where("admin", 0)->count();
        $chef = User::where("admin", 1)->count();
        $user = Auth::user()->cni;
        $veh = Vehicule::where("fk_client_id", Auth::user()->id)->get();

        if ($user) {
        return view('home_impot', [
            'vehicules' => $veh,
            'users' => $users,
            'admin' => $admin,
            'chef' => $chef,
        ]);

        } else {
        return view('home_impot', [
            'vehicules' => $veh,
            'user' => Auth::user(),
            'users' => $users,
            'admin' => $admin,
            'chef' => $chef,
        ]);

        }
        
})->name('home_impot')->middleware('auth');


Route::get('home_douanier', function() {

        $users = User::All()->count();
        $admin = User::where("admin", 0)->count();
        $chef = User::where("admin", 1)->count();
        $veh = Vehicule::all();

        return view('home_douanier', [
            'vehicules' => $veh,
            'users' => $users,
            'admin' => $admin,
            'chef' => $chef,
        ]);

})->name('home_douanier')->middleware('auth');



Route::get('profile', function() {
        
        $user = Auth::user();

        return view('profile.index', [
            'user' => $user,
        ]);

})->name('profile')->middleware('auth');

