<?php

namespace App\Providers;

use App\Basket;
use App\Category;
use App\Comment;
use App\UserTicket;
use App\WishList;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); 
            
        
        # Send basket to Header
        $categories=Category::where('subset',0)->get();
        view()->composer('layouts.Default.header', function($view) use($categories){
            
            $basket=new Basket();
            
            $userLogined=auth()->user();
            if($userLogined != null){
                
                $disValue=0;
                $baskets=Basket::where([ ['user_id', $userLogined->id], ['status', '0'] ])->get();    
                $sumProduct=$basket->sumProdcuct($baskets);
                $WishLists=WishList::where('user_id', $userLogined->id)->get();

                #Calculate Discount Price
                foreach($baskets as $basket){
                    for($i=0; $i < $basket->count; $i++)
                        $disValue=$disValue + $basket->product_data->dis_value;
                    }
                    
                $view->with(['categories' => $categories,'baskets' => $baskets, 'sumProduct' => $sumProduct, 'disValue' => $disValue, 'wishLists' => $WishLists->count()]);
                }else
                    $view->with(['baskets' => null, 'categories' => $categories]);
                
            }); 

            view()->composer('layouts.Default.aside', function($view) use($categories) {
                $view->with(['categories' => $categories]);
            });


            #Send to Panel Admin into Custom View
            view()->composer('layouts.Admin.header', function($view){
            if(auth()->check()){
                $typeOfUser=auth()->user()->type;
                if($typeOfUser == 'admin'){
                        $comments = Comment::where('shared', '0')->get();
                        $allTickets = UserTicket::where('status', 'wait')->limit(4)->get();
                        $userTickets = UserTicket::where('status', 'wait')->where('user_id', '!=', null)->count();
                        $gustickets = UserTicket::where('status', 'wait')->where('user_id', null)->count();
                        $tickets=['allTicket' => $allTickets, 'userTickets' => $userTickets, 'gustickets' => $gustickets];
                        $view->with(['comments' => $comments, 'tickets' => $tickets]);
                        
                    }
                    
                }
            });    
            
            
    }
}
