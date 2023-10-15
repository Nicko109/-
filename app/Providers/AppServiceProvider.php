<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {

            $user = User::where('email', $validator->getData()['email'])->first();


            if ($user && Hash::check($value, $user->password)) {
                return true;
            }

            return false;
        });

        Paginator::defaultView('vendor.pagination.semantic-ui');
    }
}
