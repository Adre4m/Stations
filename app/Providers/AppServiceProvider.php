<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('siret', function($attribute, $value, $parameters, $validator)
        {
            $value = preg_replace('/\D/', '', $value);
            $number_length = strlen($value);
            if($number_length <> 14)
            {
                return false;
            }
            $parity = 14 % 2;
            $sum = 0;
            for($i = 8; 0 <= $i; $i--)
            {
                $digit = $value[$i];
                if($i % 2 != $parity)
                {
                    $digit *= 2;
                    if($digit > 9)
                    {
                        $digit -= 9;
                    }
                }
                $sum += $digit;
            }
            return ($sum % 10 === 0);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
