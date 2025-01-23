<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * A home útvonal állandója.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Alkalmazás route binding-jei és pattern-ei definiálása.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Definiálja az alkalmazás route-jait.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Definiálja az API route-jait.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Definiálja a webes route-jait.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
}
