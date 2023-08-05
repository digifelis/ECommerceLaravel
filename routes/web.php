<?php

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\WishlistAllComponent;

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use App\Http\Livewire\Admin\AdminCategoryAddComponent;
use App\Http\Livewire\Admin\AdminCategoryEditComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminProductAddComponent;
use App\Http\Livewire\Admin\AdminProductEditComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
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


Route::get('/', HomeComponent::class)->name('home.index');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/shop/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/category/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('shop.checkout');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/wishlist', WishlistAllComponent::class)->name('product.wishlistall');


Route::middleware(['auth'])->group(function () {
    Route::get('/user/dasboard', UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth', 'authadmin'])->group(function(){
    Route::get('/admin/dasboard', AdminDashboardComponent::class)->name('admin.dasboard');
    Route::get('/admin/category', AdminCategoriesComponent::class)->name('admin.category');
    Route::get('/admin/category/add', AdminCategoryAddComponent::class)->name('admin.category.add');
    Route::get('/admin/category/edit/{category_id}', AdminCategoryEditComponent::class)->name('admin.category.edit');

    Route::get('/admin/products', AdminProductComponent::class)->name('admin.product');
    Route::get('/admin/products/add', AdminProductAddComponent::class)->name('admin.product.add');
    Route::get('/admin/products/edit/{product_id}', AdminProductEditComponent::class)->name('admin.product.edit');

    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.slider.add');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.slider.edit');

});


require __DIR__.'/auth.php';
