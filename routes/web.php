<?php

use App\Livewire\Login;
use App\Livewire\Client;
use App\Livewire\Clients;
use App\Livewire\Funders;
use App\Livewire\Employee;
use App\Livewire\Expenses;
use App\Livewire\Licenses;
use App\Livewire\Revenues;
use App\Livewire\Services;
use App\Livewire\Dashboard;
use App\Livewire\Employees;
use App\Livewire\Investors;
use App\Livewire\Complaints;
use App\Livewire\Financings;
use App\Livewire\Investments;
use App\Livewire\SubServices;
use App\Livewire\UserProfile;
use App\Http\Controllers\Teste;
use App\Livewire\CommunalUnits;
use App\Livewire\Neighborhoods;
use App\Livewire\DashboardInfra;
use App\Livewire\Infrastructure;
use App\Livewire\Infrastructures;
use App\Livewire\DashboardFinance;
use App\Livewire\TwoFactoryVerify;
use App\Livewire\Finances\Invoices;
use App\Livewire\Finances\Receipts;
use App\Livewire\Customers\Customer;
use App\Livewire\DashboardEmployees;
use App\Livewire\AdministrativePosts;
use App\Livewire\Customers\Customers;
use App\Livewire\Finances\Expensives;
use App\Livewire\Suppliers\Suppliers;
use Illuminate\Support\Facades\Route;
use App\Livewire\Finances\AccountsPayable;
use App\Livewire\App\Licenses as AppLicenses;
use App\Livewire\Finances\AccountsReceivable;
use App\Livewire\Finances\Dashboard as FinancesDashboard;
use App\Livewire\Finances\Expenses as FinancesExpenses;

/*
    Rotas do Sistema
**/

/*
    Rotas de Autenticacao
**/
Route::get("/", Login::class)->name('login')->middleware(['guest'/*, 'throttle:8,5'*/]);

/*
    Rota de dasahboard
**/
Route::middleware([
    'auth'
])->prefix("dashboard")->group(function(){
    //Route::get("/home", Dashboard::class)->name("dashboard-home");
    //Route::get("/employees", DashboardEmployees::class)->name("dashboard-employees");
    Route::get("/infrastructure", DashboardInfra::class)->name("dashboard-infrastructure")->middleware(['permission:view infrastructure report']);
    Route::get("/finances", FinancesDashboard::class)->name("dashboard-finance")->middleware(['permission:view financial report']);
})->middleware("auth");

//Rotas independentes de Funcionarios
Route::get("employees", Employees::class)->middleware(["auth"])->name("employees")->middleware(['permission:view employee report']);
Route::get("employee/{employee}", Employee::class)->middleware(["auth"])->name("employee")->middleware(['permission:create employee']);

//Clientes usando o prefixo customer
Route::get("customers", Customers::class)->middleware(["auth"])->name("customers")->middleware(['permission:view customer report']);;
Route::get("customers/{customer}", Customer::class)->middleware(["auth"])->name("customer")->middleware(['permission:create client']);;

Route::get('licenses', AppLicenses::class)->name("licenses")->middleware(["auth"]);
Route::get('invoices', Invoices::class)->name('invoices')->middleware(["auth"]);
Route::get('receipts', Receipts::class)->name('receipts')->middleware(["auth"]);

Route::get("suppliers", Suppliers::class)->name("suppliers")->middleware(["auth"]);

//Rotas independentes de Despesas
Route::get("expenses", FinancesExpenses::class)->name("expenses")->middleware(["auth", 'permission:view expense report']);

//Financas contas a receber
Route::get("accounts-receivable", AccountsReceivable::class)->middleware(["auth", 'permission:view accounts receivable'])->name("accounts-receivable");
Route::get("accounts-payable", AccountsPayable::class)->middleware(["auth", 'permission:view accounts receivable'])->name("accounts-payable");

//Rotas independentes de Investidores
Route::get("investors", Investors::class)->middleware(["auth"])->name("investors")->middleware(['permission:view investor']);

//Rotas independentes de Investimentos
Route::get("investments", Investments::class)->middleware(["auth"])->name("investments")->middleware(['permission:view investment report']);


//Rotas independentes de Investidores
Route::get("funders", Funders::class)->middleware(["auth"])->name("funders")->middleware(['permission:view financier']);

//Rotas independentes de Financiamentos
Route::get("financings", Financings::class)->middleware(["auth"])->name("financings")->middleware(['permission:view financing report']);

//Rotas independentes de reclamcoes
Route::get("complaints", Complaints::class)->middleware(["auth"])->name("complaints");

Route::get("infrastructures", Infrastructures::class)->middleware(["auth"])->name("infrastructures")->middleware(['permission:view infrastructure report'])->middleware(['permission:view infrastructure report']);
Route::get("infrastructure/{infrastructure}", Infrastructure::class)->middleware(["auth"])->name("infrastructure")->middleware(['permission:create infrastructure'])->middleware(['permission:create infrastructure']);


Route::get("profile", UserProfile::class)->middleware(["auth"])->name("profile");

Route::get("logout", function(){
    auth()->logout();
    return redirect()->route("login");
});


Route::get('2fv', TwoFactoryVerify::class)->name('two-factory-verify')->middleware(['guest']);