<?php
use App\Http\Controllers\CardController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/dashboard', function(){
    return view('dashboard.index');
});

// Route::namespace('dashboard')->group(function () {
    Route::resource('employee',EmployeeController::class);
// });

Route::get('/employee/pdf', function(){
    return "test";
})->name('employeepdf');

Route::get('/testpdf',[EmployeeController::class,'testpdf'])->name('testpdf');
Route::get('/file-import',[EmployeeController::class,'importView'])->name('import-view');
Route::post('/import',[EmployeeController::class,'import'])->name('import');
Route::get('/export-employee',[EmployeeController::class,'exportEmployee'])->name('export-employee');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
 });

//Route::get('/logout', App\Http\Controllers\HomeController::class, 'logout')->name('logout');
// Route::group(['middleware' => ['auth']], function() {
//     /**
//     * Logout Route
//     */
//     Route::get('/logout', App\Http\Controllers\HomeController::class, 'logout')->name('logout');
//  });