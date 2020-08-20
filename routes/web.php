<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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


#Authentication Routes
Auth::routes();
Route::group(['namespace'=>'Auth', 'prefix'=>'login'],function(){
    Route::get('/google', 'LoginController@redirectToProvider')->name('login.google');
    Route::get('/google/callback', 'LoginController@handleProviderCallback');
    Route::get('/waitVerification/{user}',"RegisterController@waitVerification")->name('wait.verify');
});

Route::get('dashbord','HomeController@index')->name('home')->middleware('UserLevel');

#Panel Admin Routes (BackEnd)
Route::group(['middleware'=>['auth', 'UserLevel', 'isVerified'],'namespace'=>'Admin','prefix'=>'admin'],function(){
    Route::resource('category','CategoryController');
    Route::post('comment/verify', 'CommentController@verify');
    Route::get('comment/trash', 'CommentController@trashedComment')->name('comment.trash.index');
    Route::get('comment/trash/{comment}', 'CommentController@moveToTrash')->name('comment.trash.create');
    Route::resource('comment', 'CommentController');

    

    Route::resource('filter','FilterController');
    Route::resource('page','PageController');
    #Gallery Routes
    Route::get('product/gallery', 'ProductController@gallery')->name('product.gallery');
    Route::post('product/gallery/uploade', 'ProductController@upload')->name('product.gallery.upload');
    Route::resource('product','ProductController');
    Route::get('product-filter/show/{product}', 'ProductfilterController@show')->name('product-filter.showProperty');
    Route::delete('product-filter/delete/{product}', 'ProductfilterController@')->name('product-filter.delete');
    Route::resource('product-filter', 'ProductfilterController');
    Route::resource('question', 'QuestionController');
    Route::resource('role','RoleController');
    Route::resource('slider','SliderController');

    //Gust Ticket Route
    Route::get('ticket/gust', 'AnswerTicketController@gustTickets')->name('ticket.gust.index');
    Route::get('ticket/gust/{ticket}', 'AnswerTicketController@showGust')->name('ticket.gust.show');
    Route::post('ticket/answer', 'AnswerTicketController@TicketAnswer')->name('ticket.answer.store');
    Route::delete('ticket/gust/{ticket}', 'AnswerTicketController@destroyGust')->name('ticket.gust.destroy');
    Route::get('ticket/answerd', 'AnswerTicketController@index')->name('ticket.answered');
    
    //User Ticket Route
    Route::get('ticket/user','AnswerTicketController@userTickets')->name('ticket.user.index');
    Route::get('ticket/user/{ticket}', 'AnswerTicketController@showUser')->name('ticket.user.show');
    Route::post('ticket/gust/answer', 'AnswerTicketController@userTicketsAnswer')->name('ticket.user.store');
    // Route::delete('ticket/gust/{ticket}', 'AnswerTicketController@destroyGust')->name('ticket.gust.destroy');
    // Route::get('ticket/answerd', 'AnswerTicketController@index')->name('ticket.answered');

    Route::resource('permission','PermissionController');
    Route::resource('user','UserController');
    Route::get('givefilter/category','FilterController@getFilters');
    #CK Editor Upload Image
    Route::get('ckeditor', 'CkeditorController@index')->name('ckeditor.images');
    Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

}); 
        Route::group(['middleware' => 'auth'], function () {
            Route::get('/filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
            Route::post('/filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
        });



Route::group(['middleware' => ['auth', 'isVerified']],function(){
    
    #Ajax Routes UserLogined
    Route::get('basket', 'BasketController@basketList')->name('basket.index');
    Route::post('/basket/add', 'BasketController@addToBasket');
    Route::patch('basket/update', 'BasketController@update')->name('basket.update');
    Route::get('basket/pay', 'BasketController@pay')->name('basket.pay');

    Route::post('wishlist/destroy', 'WishlistController@delete');
    Route::resource('wishlist', 'WishlistController');
    Route::delete('basket/delete/{basket}', 'BasketController@destroy')->name('basket.destroy');
});






/* FrontEnd Routes */
Route::group([],function(){
    Route::get('/', 'IndexController@index')->name('index');    
    Route::get('category/{category}','CategoryController@show')->name('category.product');
    Route::get('contact-us','IndexController@contactUs')->name('contact.us');
    Route::get('FAQ', 'Admin\QuestionController@faq')->name('faq');
    Route::get('page/{page}','Admin\PageController@show')->name('page.show');
    Route::post('/products/comment', 'Admin\CommentController@store')->name('product.comment');
    Route::resource('products','ProductController');
    Route::post('ticket/send', 'Admin\QuestionController@createTicket')->name('ticket.send');

    #Ajax Route Default 
    Route::get('/product/search', 'ProductController@searchProduct');
});


Route::get('/test',function(){

});

#Users Panel Routes
Route::get('profile', 'ProfileController@index')->name('profile.index')->middleware('auth');
Route::group(['namespace' => 'User', 'middleware' => ['auth', 'UserLevel'], 'prefix'=> 'profile'], function(){
    Route::get('ticket', 'UserTicketController@index')              ->name('user.ticket.index');
    Route::get('ticket/new', 'UserTicketController@create')         ->name('user.ticket.create');
    Route::get('ticket/{ticket}', 'UserTicketController@show')      ->name('user.ticket.show');
    Route::post('ticket/new/store', 'UserTicketController@store')   ->name('user.ticket.store');
});


Route::get("test", function(){
    return Hash::make("1234");
});