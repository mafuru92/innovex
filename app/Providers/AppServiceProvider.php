<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Routing\UrlGenerator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        //
        //\URL::forceScheme('https');
        Schema::defaultStringLength(191);
 /**
        if(env('REDIRECT_HTTPS'))
        {
            $this->app['request']->server->set('HTTPS', true);
          $url->forceSchema('https');
        }
      
         */
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
  if(env('REDIRECT_HTTPS')) {
    $this->app['request']->server->set('HTTPS', true);
    URL::forceScheme('https');
}
    }
}
