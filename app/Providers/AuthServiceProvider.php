<?php

namespace App\Providers;

use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Models\Model' => 'App\Policies\ProductPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();

// dd(auth()->user());

        Gate::define('product_create', [ProductPolicy::class, 'create']);
            // dd(auth()->user()->role_id);
        Gate::define('product_delete', [ProductPolicy::class, 'delete']);
            // dd(auth()->user()->role_id);
        Gate::define('product_edit', [ProductPolicy::class, 'edit']);
            // dd(auth()->user()->role_id);
    }
}
