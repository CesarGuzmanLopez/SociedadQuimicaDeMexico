<?php

namespace App\Providers;
/**
 *
 * Creado Usando  Reliese Model.
 * @author Cesar Gerardo Guzman López
 */

use App\Models\Permission;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    { 
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    { 
         try {
             Permission::get()->map(function ($permission) { 
             Gate::define($permission->slug, function () use ($permission) {
             	return Auth::user()->hasPermissionTo($permission); 
             });
            });             
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}
