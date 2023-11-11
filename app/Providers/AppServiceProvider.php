<?php

namespace App\Providers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        //
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        try {
            DB::connection()->getPdo();


        $settings = DB::table('settings')->where('id', 1)->first();

        view()->share('header', $settings->header);
        view()->share('footer', $settings->footer);
        view()->share('CreatePageAds1', $settings->CreatePageAds1);
        view()->share('CreatePageAds2', $settings->CreatePageAds2);
        view()->share('CreatePageAds3', $settings->CreatePageAds3);
        view()->share('HomePageAds1', $settings->HomePageAds1);
        view()->share('HomePageAds2', $settings->HomePageAds2);
        view()->share('HomePageAds3', $settings->HomePageAds3);
        view()->share('SharePageAds1', $settings->SharePageAds1);
        view()->share('SharePageAds2', $settings->SharePageAds2);
        view()->share('SharePageAds3', $settings->SharePageAds3);
        view()->share('ShowPageAds1', $settings->ShowPageAds1);
        view()->share('ShowPageAds2', $settings->ShowPageAds2);
        view()->share('ShowPageAds3', $settings->ShowPageAds3);
        view()->share('showVotePageAds1', $settings->showVotePageAds1);
        view()->share('showVotePageAds2', $settings->showVotePageAds2);
        view()->share('showVotePageAds3', $settings->showVotePageAds3);
        }
        catch (\Exception $e) {
            // Handle the exception if an error occurs during the database connection
            // You might want to log the error or take other actions
        }

    }
}
