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
        $this->app->singleton('api.collect.live',LivePreview::class);
        print_r(config('sdk'));
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot(){

    }
}