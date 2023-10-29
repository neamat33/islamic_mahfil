<?php
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\VerificationController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\OccupationController;
use Illuminate\Support\Facades\Route;
Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
//admin authentication system
Route::group(['prefix' => 'admin'], function () {
    //admin authentication system
    Route::get('logon', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('logon', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

    Route::group(['middleware' => ['auth:admin', 'prevent-back-history']], function () {
        Route::get('/home', [AdminHomeController::class, 'getDashboard'])->name('admin.dashboard');
        //Profile manage routes
        Route::get('/profile', [AdminHomeController::class, 'view_profile'])->name('admin.profile');
        Route::get('/dashboard', [AdminHomeController::class, 'dashboard'])->name('view.dashboard');
        Route::put('/profile/{id}', [AdminHomeController::class, 'update_general'])->name('update_general');
        Route::post('/profile/password/{id}', [AdminHomeController::class, 'update_password'])->name('admin.update.password');
        //income
        Route::get('/income/create',[\App\Http\Controllers\Admin\IncomeController::class,'create'])->name('income.create');
        Route::get('/income/list',[\App\Http\Controllers\Admin\IncomeController::class,'index'])->name('income.index');
        Route::post('/income/store',[\App\Http\Controllers\Admin\IncomeController::class,'store'])->name('income.store');
        Route::get('/income/edit/{id}',[\App\Http\Controllers\Admin\IncomeController::class,'edit'])->name('income.edit');
        Route::put('/income/update/{id}',[\App\Http\Controllers\Admin\IncomeController::class,'update'])->name('income.update');
        Route::delete('/income/destroy/{id}',[\App\Http\Controllers\Admin\IncomeController::class,'destroy'])->name('income.destroy');
        Route::get('/income/report',[\App\Http\Controllers\Admin\IncomeController::class,'report'])->name('income.report');
        Route::post('/income/getreport',[\App\Http\Controllers\Admin\IncomeController::class,'getreport'])->name('income.getreport');
        Route::get('/income/invoice/{id}',[\App\Http\Controllers\Admin\IncomeController::class,'print'])->name('income.invoice');
        //income category
        Route::get('/income-category/list',[\App\Http\Controllers\Admin\IncomeCategoryController::class,'index'])->name('income_category.index');
        Route::post('/income-category/store',[\App\Http\Controllers\Admin\IncomeCategoryController::class,'store'])->name('income_category.store');
        Route::get('/income-category/edit/{id}',[\App\Http\Controllers\Admin\IncomeCategoryController::class,'edit'])->name('income_category.edit');
        Route::put('/income-category/update/{id}',[\App\Http\Controllers\Admin\IncomeCategoryController::class,'update'])->name('income_category.update');
        Route::delete('/income-category/destroy/{id}',[\App\Http\Controllers\Admin\IncomeCategoryController::class,'destroy'])->name('income_category.destroy');
        //expense
        Route::get('/expense/create',[\App\Http\Controllers\Admin\ExpenseController::class,'create'])->name('expense.create');
        Route::get('/expense/list',[\App\Http\Controllers\Admin\ExpenseController::class,'index'])->name('expense.index');
        Route::post('/expense/store',[\App\Http\Controllers\Admin\ExpenseController::class,'store'])->name('expense.store');
        Route::get('/expense/edit/{id}',[\App\Http\Controllers\Admin\ExpenseController::class,'edit'])->name('expense.edit');
        Route::put('/expense/update/{id}',[\App\Http\Controllers\Admin\ExpenseController::class,'update'])->name('expense.update');
        Route::delete('/expense/destroy/{id}',[\App\Http\Controllers\Admin\ExpenseController::class,'destroy'])->name('expense.destroy');
        Route::get('/expense/report',[\App\Http\Controllers\Admin\ExpenseController::class,'report'])->name('expense.report');
        Route::post('/expense/getreport',[\App\Http\Controllers\Admin\ExpenseController::class,'getreport'])->name('expense.getreport');
        Route::get('/expense/invoice/{id}',[\App\Http\Controllers\Admin\ExpenseController::class,'print'])->name('expense.invoice');
        Route::get('report/profit-loss',[\App\Http\Controllers\Admin\ExpenseController::class,'profit_loss'])->name('report.profit_loss');
        Route::post('report/profit_loss_report',[\App\Http\Controllers\Admin\ExpenseController::class,'profit_loss_report'])->name('report.profit_loss_report');
        //expense category
        Route::get('/expense-category/list',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'index'])->name('expense_category.index');
        Route::post('/expense-category/store',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'store'])->name('expense_category.store');
        Route::get('/expense-category/edit/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'edit'])->name('expense_category.edit');
        Route::put('/expense-category/update/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'update'])->name('expense_category.update');
        Route::delete('/expense-category/destroy/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'destroy'])->name('expense_category.destroy');

        Route::get('/expense-category/list',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'index'])->name('expense_category.index');
        Route::post('/expense-category/store',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'store'])->name('expense_category.store');
        Route::get('/expense-category/edit/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'edit'])->name('expense_category.edit');
        Route::put('/expense-category/update/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'update'])->name('expense_category.update');
        Route::delete('/expense-category/destroy/{id}',[\App\Http\Controllers\Admin\ExpensecategoryController::class,'destroy'])->name('expense_category.destroy');

        Route::resource('speakers',MemberController::class);
        Route::get('get-district', [MemberController::class,'getDistrict']);
        Route::get('get-upazila', [MemberController::class,'getUpazila']);
        Route::get('get-unions', [MemberController::class,'getUnions']);
        Route::get('speakers/delete/{id}', [MemberController::class,'destroy'])->name('speakers.delete');

        Route::resource('designations',DesignationController::class);
        Route::get('designation_edit',[DesignationController::class,'edit']);
        Route::put('designations/update/{id}',[DesignationController::class,'update']);
        Route::get('designations/delete/{id}', [DesignationController::class,'destroy'])->name('designations.delete');

        Route::resource('occupations',OccupationController::class);
        Route::get('occupation_edit',[OccupationController::class,'edit']);
        Route::put('occupations/update/{id}',[OccupationController::class,'update']);
        Route::get('occupations/delete/{id}', [OccupationController::class,'destroy'])->name('positions.delete');
       
        
    });
});
