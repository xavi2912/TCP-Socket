<?php

namespace Parsidev\Socket;

use Illuminate\Support\ServiceProvider;

class SocketServiceProvider extends ServiceProvider {

    protected $defer = true;

    public function boot() {
        $this->publishes([
            __DIR__ . '/../../config/tcp-socket.php' => config_path('tcp-socket.php'),
        ]);
    }

    public function register() {
        $this->app->singleton('tcpsocket', function($app) {
            $config = config('tcp-socket');
            return new Socket($config);
        });
    }

    public function provides() {
        return ['tcpsocket'];
    }

}
