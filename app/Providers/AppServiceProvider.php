<?php

namespace App\Providers;

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
        // $catss = Game::Orderby('id', 'desc')->get();
        // $flash = Flash::Orderby('id', 'desc')->first();
        // $socialmedia =DB::table('socialmedias')->Orderby('id', 'desc')->get();
        // // $games=Game::Orderby('id', 'asc')->get();
        // // $accounts=Account::Orderby('id', 'desc')->get();
        // // $newss = News::Orderby('id', 'desc')->get();
        // $subcategorys= Category::orderby('id','desc')->get();

        //  View::share(compact('catss','subcategorys','flash','socialmedia'));
    }
}
