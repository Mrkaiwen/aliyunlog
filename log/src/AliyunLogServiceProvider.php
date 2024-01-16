<?php

namespace xs_aliyun\log;

use Illuminate\Support\ServiceProvider;

class AliyunLogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/laravel/AliyunLogConfig.php' => config_path('AliyunLogConfig.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/laravel/AliyunLogConfig.php', 'AliyunLogConfig'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
