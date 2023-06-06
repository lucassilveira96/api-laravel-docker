<?php

namespace App\Providers;

use App\Models\Client;
use App\Repositories\Client\ClientRepository;
use App\Services\Cep\CepService;
use App\Services\Client\ClientService;
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

        $this->app->bind(Client::class, function ($app){
            return new Client();
        });

        $this->app->bind(ClientService::class, function ($app){
          return new ClientService(new ClientRepository(new Client()));
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
