<?php

namespace App\Providers;

use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class FooBarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    // ini untuk kasus yang sederhana saja, kalo kompleks maka tidak bisa gunakan yang ini.
    public array $singleton = [
        HelloService::class => HelloServiceIndonesia::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // disini kita harus melalukan registrasi dependency yang dibutuhkan ke service container
        // dan jangan melakukan kode selain registrasi, jika tidak maka akan terjadi error dependency
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });

        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // disini kita bisa melakukan hal apapun yang diperlukan setelah proses registrasi dependency selesai

    }

    public function provides()
    {
        return [HelloService::class, HelloServiceIndonesia::class];
    }
}
