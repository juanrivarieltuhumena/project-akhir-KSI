<?php

namespace App\Providers;

use App\Models\Pemain;
use App\Policies\PemainPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Pemain::class => PemainPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
