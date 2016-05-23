<?php

namespace App\Providers;

use Form;
use Illuminate\Support\MessageBag;
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
            if($number_length != 14)
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

        Form::component('buttons', 'form.buttons', ['name', 'value', 'attributes' => [],]);
        Form::component('globalText', 'form.text',['name', 'value', 'attributes' => [],]);
        Form::component('globalDate', 'form.date', ['name', 'value', 'attributes' => [],]);
        Form::component('globalSelect', 'form.select', ['name', 'options', 'value', 'attributes' => [],]);
        Form::component('globalCheckbox', 'form.checkbox', ['name', 'options', 'value', 'attributes' => [],]);
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
