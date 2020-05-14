<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
    return view('pages.index');
});


//Route::get('/test', function (Request $request) {
//    $dt = Carbon::now('Asia/Ho_Chi_Minh');
//    echo $dt->format('d-m-Y');
////    dd($now);
//});
//Route::get('/test', function () {
//    $img = Image::make('maxresdefault.jpg');
//    $img->save('public/images/product/baz.jpg');
//    return  $img->response('jpg');
//});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin route: all by the default of laravel system
Route::group(['prefix'=>'admin'], function (){
    Route::get('/home', 'AdminController@index');
    Route::get('/', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Admin\LoginController@login');

    //Admin Acount
    Route::get('/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
    Route::get('/password/change','AdminController@ChangePassword')->name('admin.password.change');
    Route::post('/password/update','AdminController@Update_pass')->name('admin.password.update');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');

    //Admin Category
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('brands', 'Admin\BrandController');
    Route::resource('subcategories', 'Admin\SubCategoryController');
    Route::resource('coupons', 'Admin\CouponController');
    Route::get('/subscribers', 'Admin\SubscriberController@index')->name('admin.subscribers');
    Route::post('/subscribers/{id}', 'Admin\SubscriberController@SubscriberDestroy')->name('subscribers.destroy');

    //Admin product
    Route::resource('products', 'Admin\ProductController');
    Route::get('deactivated/products/{id}', 'Admin\ProductController@deactivated')->name('products.deactivated');
    Route::get('activated/products/{id}', 'Admin\ProductController@activated')->name('products.activated');
    Route::get('delete/product/{id}', 'Admin\ProductController@DeleteProduct')->name('products.delete');
    Route::post('update/product/nophoto/{id}', 'Admin\ProductController@UpdateProductNoPhoto');
    Route::post('update/product/photo/{id}', 'Admin\ProductController@UpdateProductPhoto');

    Route::get('/product/stock', 'Admin\UserRoleController@ProductStock')->name('admin.product.stock');

    // For Show Sub category with ajax
//    Route::get('get/subcategory/{category_id}', 'Admin\ProductController@GetSubcategory');

    //Admin Blogs
    Route::resource('blogs', 'Admin\BlogController');
    Route::get('delete/blog/{id}', 'Admin\BlogController@DeleteBlog')->name('blogs.delete');
    Route::post('update/blog/{id}', 'Admin\BlogController@UpdateBlog');
    Route::resource('blogcategories', 'Admin\BlogCategoryController');

    //Admin Orders
    Route::get('/pading/order', 'Admin\OrderController@NewOrder')->name('admin.neworder');
    Route::get('/view/order/{id}', 'Admin\OrderController@ViewOrder');
    Route::get('/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
    Route::get('/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');
    Route::get('/accept/payment', 'Admin\OrderController@AcceptPayment')->name('admin.accept.payment');
    Route::get('/cancel/order', 'Admin\OrderController@CancelOrder')->name('admin.cancel.order');

    Route::get('/process/payment', 'Admin\OrderController@ProcessPayment')->name('admin.process.payment');
    Route::get('/success/payment', 'Admin\OrderController@SuccessPayment')->name('admin.success.payment');

    Route::get('/delevery/process/{id}', 'Admin\OrderController@DeleveryProcess');
    Route::get('/delevery/done/{id}', 'Admin\OrderController@DeleveryDone');

    //Return Orders
    Route::get('/return/request/', 'Admin\ReturnController@ReturnRequest')->name('admin.return.request');
    Route::get('/approve/return/{id}', 'Admin\ReturnController@ApproveReturn');
    Route::get('/all/return/', 'Admin\ReturnController@AllReturn')->name('admin.all.return');

    //Report
    Route::get('/today/order', 'Admin\ReportController@TodayOrder')->name('today.order');
    Route::get('/today/delivery', 'Admin\ReportController@TodayDelivery')->name('today.delivery');
    Route::get('/this/month', 'Admin\ReportController@ThisMonth')->name('this.month');
    Route::get('/search/report', 'Admin\ReportController@Search')->name('search.report');
    Route::post('/search/by/year', 'Admin\ReportController@SearchByYear')->name('search.by.year');
    Route::post('/search/by/month', 'Admin\ReportController@SearchByMonth')->name('search.by.month');
    Route::post('/search/by/date', 'Admin\ReportController@SearchByDate')->name('search.by.date');

    //Role
    Route::get('/all/user', 'Admin\UserRoleController@UserRole')->name('admin.all.user');
    Route::get('/create/admin', 'Admin\UserRoleController@UserCreate')->name('create.admin');
    Route::post('/store/admin', 'Admin\UserRoleController@UserStore')->name('store.admin');
    Route::get('/edit/admin/{id}', 'Admin\UserRoleController@UserEdit');
    Route::post('/update/admin', 'Admin\UserRoleController@UserUpdate')->name('update.admin');
    Route::delete('/delete/admin/{id}', 'Admin\UserRoleController@UserDelete');

    //Admin Seo
    Route::get('/seo', 'Admin\OrderController@seo')->name('admin.seo');
    Route::post('/seo/update', 'Admin\OrderController@UpdateSeo')->name('update.seo');

    Route::get('admin/site/setting', 'Admin\SettingController@SiteSetting')->name('admin.site.setting');
    Route::post('admin/sitesetting', 'Admin\SettingController@UpdateSiteSetting')->name('update.sitesetting');
    Route::get('/all/message', 'ContactController@AllMessage')->name('all.message');
});
//socialite Route
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('get/subcategory/{category_id}', 'Admin\ProductController@GetSubcat');
//Front-end Routes
Route::post('subscriber/store', 'FrontendController@SubscriberStore')->name('subscribers.store');
Route::post('product/search', 'FrontendController@Search')->name('product.search');

//Cart
Route::get('add/to/cart/{id}', 'CartController@AddCart');
Route::get('check', 'CartController@check');
Route::get('/product/details/{id}/{product_name}', 'ProductController@ProductView');
Route::post('/cart/product/add/{id}', 'ProductController@AddtoCart');
Route::get('product/cart', 'CartController@ShowCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'CartController@removeCart');
Route::post('update/cart/item/', 'CartController@UpdateCart')->name('update.cart');
Route::post('insert/into/cart/', 'CartController@insertCart')->name('insert.into.cart');
Route::get('remove/cart/{rowId}', 'CartController@removeCart');
Route::get('/cart/product/view/{id}', 'CartController@ViewProduct');

Route::post('order/tracking', 'FrontendController@OrderTraking')->name('order.tracking');

//wishlist
Route::get('user/wishlist/', 'CartController@wishlist')->name('user.wishlist');
Route::get('add/wishlist/{id}', 'WishlistController@addWishlist');

//Coupon
Route::post('user/apply/coupon/', 'CartController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/', 'CartController@CouponRemove')->name('coupon.remove');

//Checkout and Payment
Route::get('user/checkout/', 'CartController@Checkout')->name('user.checkout');
Route::get('payment/page', 'CartController@PaymentPage')->name('payment.step');
Route::post('user/payment/process/', 'PaymentController@Payment')->name('payment.process');
Route::post('user/stripe/charge/', 'PaymentController@StripeCharge')->name('stripe.charge');
Route::post('user/oncash/charge/', 'PaymentController@OnCash')->name('oncash.charge');

// orders
Route::get('success/list/', 'PaymentController@SuccessList')->name('success.orderlist');
Route::get('request/return/{id}', 'PaymentController@RequestReturn');


//Blog
Route::get('blog/post/', 'BlogController@blog')->name('blog.post');
Route::get('language/english', 'BlogController@English')->name('language.english');
Route::get('language/vietnam', 'BlogController@Vietnam')->name('language.vietnam');
Route::get('blog/single/{id}', 'BlogController@BlogSingle');

//Page
Route::get('products/{id}', 'ProductController@ProductsView');
Route::get('allcategory/{id}', 'ProductController@CategoryView');

//Contact
Route::get('contact/page', 'ContactController@Contact')->name('contact.page');
Route::post('contact/form', 'ContactController@ContactForm')->name('contact.form');
