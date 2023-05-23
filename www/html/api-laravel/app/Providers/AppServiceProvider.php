<?php

namespace App\Providers;

use App\Models\Cliente;
use App\Repositories\Cliente\ClienteRepository;
use App\Services\Cep\CepService;
use App\Services\Cliente\ClienteService;
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
        $this->app->bind(CepService::class, function ($app){
            return new CepService();
        });

        $this->app->bind(Cliente::class, function ($app){
            return new Cliente();
        });

        $this->app->bind(ClienteService::class, function ($app){
          return new ClienteService(new ClienteRepository(new Cliente()));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
