<?php

namespace Crud\App\Core\Providers;

// use Illuminate\Support\Facades\Gate;
use Crud\Domain\NivelGate\Models\NivelGate;
use Crud\Domain\Gate\Models\Gate as GateBd;
use Crud\Domain\User\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'Crud\Models\Model' => 'Crud\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        foreach (GateBd::all() as $gateBd) {
//            Gate::define($gateBd->nome, function (User $user) use ($gateBd) {
//                return NivelGate::query()
//                        ->where('nivel_id', $user->nivel->id)
//                        ->where('gate_id', $gateBd->id)
//                        ->count() > 0;
//            });
//        }
    }
}
