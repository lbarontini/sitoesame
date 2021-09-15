<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function(User $user){
            //admin is always autorized
            if($user->isAdmin()){
                return true;
            }
        });

        Gate::define('admin_work', function(User $user){
            return $user->isAdmin();
        });

        Gate::define('staff_work_product', function(User $user,Product $product){
            if ($user->isStaff()&&$product->user->id===$user->id)
                return true;
            else
                return false;
        });

        Gate::define('tecn_work', function(User $user){
            if ($user->isStaff()||$user->isTecn()){
                return true;
            }
            else {
                return false;
            }
        });

    }
}
