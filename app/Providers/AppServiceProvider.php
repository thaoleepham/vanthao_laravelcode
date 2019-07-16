<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\loai_xe;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('menu',function($view){
            $loaixe2= loai_xe::where('so_banh',2)->get();
            $loaixe4= loai_xe::where('so_banh',4)->get();
            $view->with('xemay',$loaixe2);
            $view->with('oto',$loaixe4);
        });
      
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
