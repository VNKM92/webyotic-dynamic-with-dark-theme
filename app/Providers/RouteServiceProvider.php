<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();

        Route::middleware('web')
             ->group(base_path('routes/admin.php'));
    }
}
