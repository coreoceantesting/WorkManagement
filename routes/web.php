<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('/');


// Guest Users
Route::middleware(['guest', 'PreventBackHistory', 'firewall.all'])->group(function () {
    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('signin');
    Route::get('register', [App\Http\Controllers\Admin\AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [App\Http\Controllers\Admin\AuthController::class, 'register'])->name('signup');
});




    // Authenticated users
    Route::middleware(['auth', 'PreventBackHistory', 'firewall.all'])->group(function () {

    // Auth Routes
    Route::get('home', fn () => redirect()->route('dashboard'))->name('home');
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'Logout'])->name('logout');
    Route::get('change-theme-mode', [App\Http\Controllers\Admin\DashboardController::class, 'changeThemeMode'])->name('change-theme-mode');
    Route::get('show-change-password', [App\Http\Controllers\Admin\AuthController::class, 'showChangePassword'])->name('show-change-password');
    Route::post('change-password', [App\Http\Controllers\Admin\AuthController::class, 'changePassword'])->name('change-password');



    // Masters
    Route::resource('wards', App\Http\Controllers\Admin\Masters\WardController::class);
    Route::resource('financial_year', App\Http\Controllers\Admin\Masters\FinancialYearController::class);
    Route::resource('source_of_fund', App\Http\Controllers\Admin\Masters\SourceOfFundController::class);
    Route::resource('schemes', App\Http\Controllers\Admin\Masters\SchemesController::class);
    Route::resource('locations', App\Http\Controllers\Admin\Masters\LocationsController::class);
    Route::resource('departments', App\Http\Controllers\Admin\Masters\DepartmentsController::class);
    Route::resource('designation', App\Http\Controllers\Admin\Masters\DesignationController::class);
    Route::resource('contractor', App\Http\Controllers\Admin\Masters\ContractorController::class);
    Route::resource('contractor_type', App\Http\Controllers\Admin\Masters\ContractorTypesController::class);
    Route::resource('contract_type', App\Http\Controllers\Admin\Masters\ContractTypesController::class);
    Route::resource('deposit_type', App\Http\Controllers\Admin\Masters\DepositTypesController::class);
    Route::resource('bank', App\Http\Controllers\Admin\Masters\BanksController::class);
    Route::resource('payment_mode', App\Http\Controllers\Admin\Masters\PaymentModeController::class);
    Route::resource('sor', App\Http\Controllers\Admin\Masters\SORController::class);
    Route::resource('cow', App\Http\Controllers\Admin\Masters\COWController::class);
    Route::resource('ratetype', App\Http\Controllers\Admin\Masters\RateTypeController::class);
    Route::post('/import',[App\Http\Controllers\Admin\Masters\RateTypeController::class,'import'])->name('import'); 
    Route::resource('field', App\Http\Controllers\Admin\Masters\FieldController::class);
    Route::resource('budgethead', App\Http\Controllers\Admin\Masters\BudgetHeadController::class);
    Route::resource('majorfund', App\Http\Controllers\Admin\Masters\Fund\MajorFundController::class);
    Route::resource('minorfund', App\Http\Controllers\Admin\Masters\Fund\MinorFundController::class);
    Route::resource('tax', App\Http\Controllers\Admin\Masters\TaxController::class);
    Route::resource('work', App\Http\Controllers\Admin\Masters\WorkController::class);
    Route::resource('project', App\Http\Controllers\Admin\Masters\ProjectController::class);
    Route::resource('asset', App\Http\Controllers\Admin\Masters\AssetController::class);
    Route::resource('form', App\Http\Controllers\Admin\Form\FormController::class);
    Route::resource('laboratory', App\Http\Controllers\Admin\Masters\LaboratoryController::class);
    Route::resource('bgsd', App\Http\Controllers\Admin\Masters\BgsdController::class);
    Route::resource('bid', App\Http\Controllers\Admin\Masters\BidController::class);
    Route::resource('tenderentry', App\Http\Controllers\Admin\Masters\TenderEntryController::class);
    Route::get('search/results', [ App\Http\Controllers\Admin\Masters\TenderEntryController::class, 'getResults'])->name('search.results');
    Route::resource('approvalsanction', App\Http\Controllers\Admin\Masters\ApprovalSanctionController::class);
    Route::resource('tenderexecution', App\Http\Controllers\Admin\Masters\TenderExecutionController::class);
    



    //prefix
    Route::resource('mainprefix', App\Http\Controllers\Admin\Prefix\mainprefixController::class);
    Route::resource('prefixdetail', App\Http\Controllers\Admin\Prefix\prefixdetailController::class);
    Route::get('/prefixdetail/{mainprefix_id}', [ App\Http\Controllers\Admin\Prefix\prefixdetailController::class, 'getprefixdetailBymainprefix']);

    //projectinformation
    Route::resource('projectinfo', App\Http\Controllers\Admin\Masters\ProjectinfoController::class);
    Route::get('/workdefinition/{id}', [ App\Http\Controllers\Admin\Masters\WorkdefinitionController::class, 'getDepartment']);
    Route::resource('workdefinition', App\Http\Controllers\Admin\Masters\WorkdefinitionController::class);
    // Route::get('/projectinfo/{status}', App\Http\Controllers\Admin\Masters\ProjectinfoController::class);


    // Users Roles n Permissions
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::get('users/{user}/toggle', [App\Http\Controllers\Admin\UserController::class, 'toggle'])->name('users.toggle');
    Route::get('users/{user}/retire', [App\Http\Controllers\Admin\UserController::class, 'retire'])->name('users.retire');
    Route::put('users/{user}/change-password', [App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('users.change-password');
    Route::get('users/{user}/get-role', [App\Http\Controllers\Admin\UserController::class, 'getRole'])->name('users.get-role');
    Route::put('users/{user}/assign-role', [App\Http\Controllers\Admin\UserController::class, 'assignRole'])->name('users.assign-role');
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::get('/users/{department_id}', [ App\Http\Controllers\Admin\UserController::class, 'getuserBydepartment']);
});




Route::get('/php', function (Request $request) {
    if (!auth()->check())
        return 'Unauthorized request';

    Artisan::call($request->artisan);
    return dd(Artisan::output());
});
