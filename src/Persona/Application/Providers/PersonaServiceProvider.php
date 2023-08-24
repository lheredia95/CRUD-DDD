<?php

namespace src\Persona\Application\Providers;

use Illuminate\Support\ServiceProvider;

class PersonaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \src\Persona\Domain\Repositories\PersonaRepositoryInterface::class,
            \src\Persona\Infrastructure\PersonaEloquentModel::class
        );
    }
}
