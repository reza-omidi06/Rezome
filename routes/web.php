<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\RezomeController;
use App\Http\Controllers\Pages\ServicesController;
use App\Http\Controllers\Pages\SliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Pages\PortflolioCategoryController;
use App\Http\Controllers\Pages\PortfolioController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;

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
// Routes accessible only to guests
    Route::get('/', function () {return view('site.index');})->name('home');
    Route::get('/licence', [AdminPanelController::class, 'Showform'])->name('licence');
    Route::post('/licence/update', [AdminPanelController::class, 'UpdateLicence'])->name('licence.update');

// Routes for users with verified license and authentication
Route::middleware(['auth', 'licence_verified'])->group(function () {
    Route::get('/dashboard', [AdminPanelController::class, 'PanelController'])->middleware('is_admin')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add routes for SliderController here
    Route::controller(SliderController::class)->group(function () {
        Route::get('admin/slider/edit','SliderEdit')->name('admin.slider.edit');
        Route::post('admin/update/edit','SliderUpdate')->name('admin.update.edit');
        Route::get('admin/dynamic/edit','DynamicEdit')->name('admin.dynamic.edit');
        Route::post('admin/dynamic/update','DynamicUpdate')->name('admin.dynamic.update');
    });
    // Add routes for AboutController here
    Route::controller(AboutController::class)->group(function () {
        //About_Route
        Route::get('admin/about/manager','AboutManager')->name('admin.about.manager');
        Route::post('admin/about/update','AboutUpdate')->name('admin.about.update');
        Route::get('admin/skill/manager','SkillManager')->name('admin.skill.manager');
        //Skill_Route
        Route::get('admin/skill/add','SkillAdd')->name('admin.skill.add');
        Route::post('admin/skill/store','SkillStore')->name('admin.skill.store');
        Route::get('admin/skill/edit/{id}','SkillEdit')->name('admin.skill.edit');
        Route::post('admin/skill/update','SkillUpdate')->name('admin.skill.update');
        Route::get('admin/skill/delete/{id}','SkillDelete')->name('admin.skill.delete');
    });
    // Add routes for Services here
    Route::controller(ServicesController::class)->group(function(){
        Route::get('admin/service/manage','ServiceManager')->name('admin.service.manage');
        Route::get('admin/service/add','ServiceAdd')->name('admin.service.add');
        Route::post('admin/service/store','ServiceStore')->name('admin.service.store');
        Route::get('admin/service/edit/{id}','ServiceEdit')->name('admin.service.edit');
        Route::post('admin/service/update','ServiceUpdate')->name('admin.service.update');
        Route::get('admin/service/delete/{id}','ServiceDelete')->name('admin.service.delete');
        // Active Or InActive
        Route::post('admin/service/active','ServiceActive')->name('admin.service.active');
        Route::post('admin/service/inactive','ServiceInActive')->name('admin.service.inactive');
        //Update Service Title
        Route::post('admin/service/update/title','ServiceTitleUpdate')->name('admin.service.update.title');

    });
    // Add routes for Experience  here
    Route::controller(RezomeController::class)->group(function (){
        Route::get('admin/rezome/manage','RezomeManager')->name('admin.rezome.manage');
        Route::get('admin/rezome/add','RezomeAdd')->name('admin.rezome.add');
        Route::post('admin/rezome/store','RezomeStore')->name('admin.rezome.store');
        Route::get('admin/rezome/edit/{id}','RezomeEdit')->name('admin.rezome.edit');
        Route::post('admin/rezome/update/','RezomeUpdate')->name('admin.rezome.update');
        Route::get('admin/rezome/delete/{id}','RezomeDelete')->name('admin.rezome.delete');
        //Update Experience Title
        Route::post('admin/rezome/title','RezomeTitle')->name('admin.rezome.title');
        // Active Or InActive
        Route::post('admin/rezome/active','RezomeActive')->name('admin.rezome.active');
        Route::post('admin/rezome/inactive','RezomeInActive')->name('admin.rezome.inactive');
    });
    // Add routes for PortflolioCategory  here
    Route::controller(PortflolioCategoryController::class)->group(function (){
        Route::get('admin/portfoliocategory/manage','PortfolioCategoryManage')->name('admin.portfoliocategory.manage');
        Route::get('admin/portfoliocategory/add','PortfolioCategoryAdd')->name('admin.portfoliocategory.add');
        Route::post('admin/portfoliocategory/store','StorePortflolioCategory')->name('admin.portfoliocategory.store');
        Route::get('admin/portfoliocategory/edit/{id}','PortfolioCategoryEdit')->name('admin.portfoliocategory.edit');
        Route::post('admin/portfoliocategory/update','UpdatePortflolioCategory')->name('admin.portfoliocategory.update');
        Route::get('admin/portfoliocategory/delete/{id}','PortfolioCategoryDelete')->name('admin.portfoliocategory.delete');
    });
    // Add routes for Portfolio  here
    Route::controller(PortfolioController::class)->group(function (){
        Route::get('admin/portfolio/manage','PortfolioManage')->name('admin.portfolio.manage');
        Route::get('admin/portfolio/add','PortfolioAdd')->name('admin.portfolio.add');
        Route::post('admin/portfolio/store','PortfolioStore')->name('admin.portfolio.store');
        Route::get('admin/portfolio/edit/{id}','PortfolioEdit')->name('admin.portfolio.edit');
        Route::post('admin/portfolio/update/','PortfolioUpdate')->name('admin.portfolio.update');
        Route::get('admin/portfolio/delete/{id}','PortfolioDelete')->name('admin.portfolio.delete');
    });

});

// Public routes for authentication and password management
Route::middleware(['guest'])->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});
//require __DIR__.'/auth.php';

//step 1
//1- add proftfolio category
//2- manage proftfolio category
//3- edit proftfolio category
// step 2
//1- manage proftfolio
//2- add proftfolio
//2.1-  foreach for add category to profil
//3- edit proftfolio
//
