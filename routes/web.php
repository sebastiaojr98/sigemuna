<?php

use App\Http\Controllers\Auth\AuthOtpController;
use App\Livewire\Funders;
use App\Livewire\Employee;
use App\Livewire\Employees;
use App\Livewire\Investors;
use App\Livewire\Financings;
use App\Livewire\Investments;
use App\Livewire\UserProfile;
use App\Livewire\DashboardInfra;
use App\Livewire\Infrastructure;
use App\Livewire\Infrastructures;
use App\Livewire\Finances\Invoices;
use App\Livewire\Finances\Receipts;
use App\Livewire\Customers\Customer;
use App\Livewire\Customers\Customers;
use App\Livewire\Suppliers\Suppliers;
use Illuminate\Support\Facades\Route;
use App\Livewire\Finances\AccountsPayable;
use App\Livewire\App\Licenses as AppLicenses;
use App\Livewire\Finances\AccountsReceivable;
use App\Livewire\Finances\Expenses as FinancesExpenses;
use App\Livewire\Finances\Dashboard as FinancesDashboard;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;


Route::middleware(['guest'])->group(function(){
    Route::get('/', function(){
        return view('auth.login');
    });
    Route::post('/login', [CustomAuthenticatedSessionController::class, 'store'])->name('login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('verify-otp', [AuthOtpController::class, 'index'])->name('verify-otp');
    Route::post('verify-otp', [AuthOtpController::class, 'verify'])->name('verify-otp');
});

Route::middleware(['2fa', 'auth'])->group(function(){
    Route::prefix("dashboard")->group(function(){
        Route::get("/infrastructure", DashboardInfra::class)
            ->name("dashboard-infrastructure")
            ->middleware(['permission:view infrastructure report']);

        Route::get("/finances", FinancesDashboard::class)
            ->name("dashboard-finance")
            ->middleware(['permission:view financial report']);
    });

    Route::get("employees", Employees::class)
        ->name("employees")
        ->middleware(['permission:view employee report']);
    
    Route::get("employee/{employee}", Employee::class)
        ->name("employee")
        ->middleware(['permission:create employee']);

    Route::get("customers", Customers::class)
        ->name("customers")
        ->middleware(['permission:view customers']);

    Route::get("customers/{customer}", Customer::class)
        ->name("customer")
        ->middleware(['permission:view customer']);

    Route::get('licenses', AppLicenses::class)
        ->name("licenses")
        ->middleware(['permission:view licenses']);

    Route::get('invoices', Invoices::class)
        ->name('invoices')
        ->middleware(['permission:view invoices']);

    Route::get('receipts', Receipts::class)
        ->name('receipts')
        ->middleware(['permission:view receipts']);

    Route::get("suppliers", Suppliers::class)
        ->name("suppliers")
        ->middleware(['permission:view suppliers']);

    Route::get("expenses", FinancesExpenses::class)
        ->name("expenses")
        ->middleware(['permission:view expenses']);

    Route::get("accounts-receivable", AccountsReceivable::class)
        ->name("accounts-receivable")
        ->middleware(['permission:view accounts receivable']);

    Route::get("accounts-payable", AccountsPayable::class)
        ->name("accounts-payable")
        ->middleware(['permission:view accounts payable']);

    Route::get("investors", Investors::class)
        ->name("investors")
        ->middleware(['permission:view investor']);

    Route::get("investments", Investments::class)
        ->name("investments")
        ->middleware(['permission:view investment report']);

    Route::get("funders", Funders::class)
        ->name("funders")
        ->middleware(['permission:view financier']);

    Route::get("financings", Financings::class)
        ->name("financings")
        ->middleware(['permission:view financing report']);

    Route::get("infrastructures", Infrastructures::class)
        ->name("infrastructures")
        ->middleware(['permission:view infrastructure report']);

    Route::get("infrastructure/{infrastructure}", Infrastructure::class)
        ->name("infrastructure")
        ->middleware(['permission:create infrastructure']);


    Route::get("profile", UserProfile::class)->name("profile");

    Route::get("logout", function(){
        session()->forget('otp_verified');
        auth()->logout();
        return redirect()->route("login");
    })->name('profile');
});