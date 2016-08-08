<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Notification;
use Auth;
use DB;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        view()->share('cat', Category::orderBy('id', 'desc')
                ->get(),[Category::paginate(2)]);
        view()->share('Cat', Category::all());

        // View::composer('*',function($view){

        //         $result = DB::select('call nots(?)',array(Auth::user()->id));

        //         $view->with('result',$result);


        // });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
