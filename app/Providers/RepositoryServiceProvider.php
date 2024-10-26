<?php

namespace App\Providers;

use App\Interfaces\CaminhaoRepositoryInterface;
use App\Interfaces\ModeloRepositoryInterface;
use App\Interfaces\MotoristaRepositoryInterface;
use App\Interfaces\TransportadoraRepositoryInterface;
use App\Repositories\CaminhaoRepository;
use App\Repositories\ModeloRepository;
use App\Repositories\MotoristaRepository;
use App\Repositories\TransportadoraRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            TransportadoraRepositoryInterface::class,
            TransportadoraRepository::class
        );

        $this->app->bind(
            ModeloRepositoryInterface::class,
            ModeloRepository::class
        );

        $this->app->bind(
            MotoristaRepositoryInterface::class,
            MotoristaRepository::class
        );

        $this->app->bind(
            CaminhaoRepositoryInterface::class,
            CaminhaoRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
