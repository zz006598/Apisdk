<?php
/**
 * 验证器服务提供者.
 * User: qq
 * Date: 2018/7/2
 * Time: 13:43
 */

namespace Sea\ApiSdk\Providers;

use Illuminate\Support\ServiceProvider;
use App\Sdk\Collect\LivePreview;


class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){

    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot(){
        $this->app->configure('sdk');
        $this->publishes([
            __DIR__.'/../../resources/config/sdk.php' => config_path('sdk.php')
        ]);
        $this->mergeConfigFrom(__DIR__.'/../../resources/config/sdk.php','sdk');

        $api = config('sdk.api');
        foreach($api as $key => $value){
            $this->app->singleton($key,$value);
        }
    }
}