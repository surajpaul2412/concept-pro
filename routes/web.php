<?php

use Illuminate\Support\Facades\Route;
use App\Models\Page;

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
Auth::routes();

Route::resource('/', 'WelcomeController');
Route::resource('/welcome', 'WelcomeController');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/about', 'AboutUsController');
Route::resource('/company-profile', 'companyProfileController');
Route::get('/categories/{id}/product', 'CategoryController@product')->name('categories.product');
Route::resource('/categories', 'CategoryController');
Route::get('/product/{id}/detail', 'CategoryController@detail')->name('product.detail');
Route::resource('/site-solutions', 'SiteSolutionController');

Route::get('/case-studies', function () {
    return view('frontend.case-studies');
});
Route::get('/company-profile', function () {
    return view('frontend.company-profile');
});
Route::get('/downloads', function () {
    return view('frontend.downloads');
});

// Admin Controls
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('testimonials/{id}/deactivate','TestimonialController@deactivate')->name('testimonials.deactivate');
    Route::get('testimonials/{id}/activate','TestimonialController@activate')->name('testimonials.activate');
    Route::resource('testimonials','TestimonialController');
    Route::get('category/{id}/createSubCategory', 'CategoryController@createSubCategory')->name('category.createSubCategory');
    Route::post('category/{id}/storeSubCategory', 'CategoryController@storeSubCategory')->name('category.storeSubCategory');
    Route::get('category/{id}/editSubCategory', 'CategoryController@editSubCategory')->name('category.editSubCategory');
    Route::patch('category/{id}/updateSubCategory', 'CategoryController@updateSubCategory')->name('category.updateSubCategory');
    Route::delete('category/{id}/destroySubCategory', 'CategoryController@destroySubCategory')->name('category.destroySubCategory');
    Route::resource('category', 'CategoryController');
    Route::resource('subCategory', 'SubCategoryController');
    Route::get('product/tutorial', 'ProductController@tutorial')->name('product.tutorial');
    Route::resource('product', 'ProductController');
    // site-solutions
    Route::resource('siteSolution', 'SiteSolutionController');
    Route::resource('siteSolutionSection', 'SiteSolutionSectionController');
    // banner
    Route::resource('banner', 'BannerController');
    // page
    Route::resource('page', 'PageController');
});

$pages = Page::all();
foreach ($pages as $page) {
    Route::get('/'.$page->slug.'', function() use($page) {
        return view('frontend.page',compact('page'));
    });
}
