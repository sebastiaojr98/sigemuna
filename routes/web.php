<?php

use App\Livewire\AdministrativePosts;
use App\Livewire\Client;
use App\Livewire\Clients;
use App\Livewire\CommunalUnits;
use App\Livewire\Complaints;
use App\Livewire\Dashboard;
use App\Livewire\DashboardEmployees;
use App\Livewire\DashboardFinance;
use App\Livewire\DashboardInfra;
use App\Livewire\Employee;
use App\Livewire\Employees;
use App\Livewire\Expenses;
use App\Livewire\Financings;
use App\Livewire\Funders;
use App\Livewire\Infrastructure;
use App\Livewire\Infrastructures;
use App\Livewire\Investments;
use App\Livewire\Investors;
use App\Livewire\Licenses;
use App\Livewire\Login;
use App\Livewire\Neighborhoods;
use App\Livewire\Revenues;
use App\Livewire\Services;
use App\Livewire\SubServices;
use App\Livewire\UserProfile;
use App\Livewire\TwoFactoryVerify;
use App\Http\Controllers\Teste;
use Illuminate\Support\Facades\Route;

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
    Route::get("/finance", DashboardFinance::class)->name("dashboard-finance")->middleware(['permission:view financial report']);
})->middleware("auth");

//Rotas independentes de Funcionarios
Route::get("employees", Employees::class)->middleware(["auth"])->name("employees")->middleware(['permission:view employee report']);
Route::get("employee/{employee}", Employee::class)->middleware(["auth"])->name("employee")->middleware(['permission:create employee']);

//Rotas independentes de Clients
Route::get("clients", Clients::class)->middleware(["auth"])->name("clients")->middleware(['permission:view customer report']);
Route::get("client/{client}", Client::class)->middleware(["auth"])->name("client")->middleware(['permission:create client']);

//Rotas independentes de Despesas
Route::get("expenses", Expenses::class)->middleware(["auth"])->name("expenses")->middleware(['permission:view expense report']);

//Rotas independentes de Receitas Internas
Route::get("revenues", Revenues::class)->middleware(["auth"])->name("revenues")->middleware(['permission:view revenue report']);

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


//Rotas de enderecos
Route::get("administrative-posts", AdministrativePosts::class)->middleware(["auth"])->name("administrative-posts")->middleware(['permission:view addresses']);

Route::get("neighborhoods", Neighborhoods::class)->middleware(["auth"])->name("neighborhoods")->middleware(['permission:view addresses']);

Route::get("communal-units", CommunalUnits::class)->middleware(["auth"])->name("communal-units")->middleware(['permission:view addresses']);

//Rotas de Actividades Servicos e Licencas
Route::get("services", Services::class)->middleware(["auth"])->name("services")->middleware(['permission:view activities']);

Route::get("sub-services", SubServices::class)->middleware(["auth"])->name("sub-services")->middleware(['permission:view activities']);

Route::get("licenses", Licenses::class)->middleware(["auth"])->name("licenses")->middleware(['permission:view activities']);

Route::get("infrastructures", Infrastructures::class)->middleware(["auth"])->name("infrastructures")->middleware(['permission:view infrastructure report'])->middleware(['permission:view infrastructure report']);
Route::get("infrastructure/{infrastructure}", Infrastructure::class)->middleware(["auth"])->name("infrastructure")->middleware(['permission:create infrastructure'])->middleware(['permission:create infrastructure']);


Route::get("profile", UserProfile::class)->middleware(["auth"])->name("profile");

Route::get("logout", function(){
    auth()->logout();
    return redirect()->route("login");
});


Route::get('2fv', TwoFactoryVerify::class)->name('two-factory-verify')->middleware(['guest']);


Route::get('testes', function(){
    return view('relatories.invoice');
});