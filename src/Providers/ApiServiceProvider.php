<?php
/**
 * 验证器服务提供者.
 * User: qq
 * Date: 2018/7/2
 * Time: 13:43
 */

namespace Sea\Apisdk\Providers;

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
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot(){

    }
}