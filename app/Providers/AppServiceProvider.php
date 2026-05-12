<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\{Property, Lease, MaintenanceRequest};
use App\Policies\{PropertyPolicy, LeasePolicy, MaintenanceRequestPolicy};

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::policy(Property::class, PropertyPolicy::class);
        Gate::policy(Lease::class, LeasePolicy::class);
        Gate::policy(MaintenanceRequest::class, MaintenanceRequestPolicy::class);
    }
}
