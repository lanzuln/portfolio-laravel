<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\socialController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\settingController;
use App\Http\Controllers\Admin\BlogListController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\feedbackController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\blogHeaderController;
use App\Http\Controllers\Admin\experienceController;
use App\Http\Controllers\Admin\FooterHelpController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\seoSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\SkillSettingController;
use App\Http\Controllers\Admin\FooterContactController;
use App\Http\Controllers\Admin\FooterUsefullController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\contactHeadingController;
use App\Http\Controllers\Admin\generalSettingController;
use App\Http\Controllers\admin\feedbackSettingController;
use App\Http\Controllers\Admin\PortfolioSettingController;


// frontend controller
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home_hero')->name('home_hero');
    Route::get('/portfolio-details/{id}', 'portfolioDetails')->name('portfolio-details-page');
    Route::get('/single-blog/{id}', 'singleBlog')->name('single-blog');
    Route::get('/blog', 'blog')->name('blog');
    Route::post('/contact', 'contact')->name('contact');
});

Route::get('/portfolio', function () {
    return view('frontend.portfolio');
});



require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboardPage')->name('dashboard');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/user', 'create');
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // hero
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);
    // service
    Route::resource('service', ServiceController::class);
    // about
    Route::resource('about', AboutController::class);


    // portfolio section
    // -------portfolio category
    Route::resource('category', CategoryController::class);
    // --------portfolio Item
    Route::resource('portfolio-item', PortfolioItemController::class);
    // ------portfolio setting(heading)
    Route::resource('portfolio-setting', PortfolioSettingController::class);


    // skil section
    Route::resource('skill', SkillSettingController::class);
    Route::resource('skill-item', SkillItemController::class);

    // Experience
    Route::resource('experience', experienceController::class);

    // Feedback
    Route::resource('feedback', feedbackController::class);
    // ------Feedback setting(heading)
    Route::resource('feedback-setting', feedbackSettingController::class);


    // Blog section
    // -------blog category
    Route::resource('blog-category', BlogCategoryController::class);
    // -------blog list
    Route::resource('blog-item', BlogListController::class);
    // -------blog header
    Route::resource('blog-header', blogHeaderController::class);


    // Contact header
    Route::resource('contact-header', contactHeadingController::class);

    //footer section
    // ------- footer social
    Route::resource('social', socialController::class);
    // ---------footer information
    Route::resource('footer-info', FooterInfoController::class);
    // ---------footer contact
    Route::resource('footer-contact', FooterContactController::class);
    // ---------footer usefullLink
    Route::resource('usefull-link', FooterUsefullController::class);
    // ---------footer help
    Route::resource('help', FooterHelpController::class);


    //  setting
    Route::get('/setting', [settingController::class, 'setting'])->name('setting');

    //------- settting general
    Route::resource('general-setting', generalSettingController::class);
    //------- seo general
    Route::resource('seo-setting', seoSettingController::class);
});
