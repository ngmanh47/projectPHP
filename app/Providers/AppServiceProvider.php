<?php

namespace App\Providers;

use App\model2\func;
use App\model2\category;
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
        view()->composer('*', function ($view) {
            $func = func::where('id_parent',0)->get();
            $category = category::get();
            // $func = chucnang::get();
            // $data = [
                
            // ];
            $list_func = func::get();
            $data = [
                'func'=>$func,
                'list_func'=>$list_func,
                'category'=>$category,
            ];
            
            $view->with($data);
        });
    }
}