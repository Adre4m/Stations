<?php

namespace App\Providers;

use Form;
use Html;
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
        Validator::extend('siret', function ($attribute, $value, $parameters, $validator) {
            $value = preg_replace('/\D/', '', $value);
            $number_length = strlen($value);
            if ($number_length != 14) {
                return false;
            }
            $parity = 14 % 2;
            $sum = 0;
            for ($i = 8; 0 <= $i; $i--) {
                $digit = $value[$i];
                if ($i % 2 != $parity) {
                    $digit *= 2;
                    if ($digit > 9) {
                        $digit -= 9;
                    }
                }
                $sum += $digit;
            }
            return ($sum % 10 === 0);
        });
        Validator::extend('unique_with', function ($attribute, $value, $parameters, $validator) {
            $validator->requireParameterCount(1, $parameters, 'unique');

            list($connection, $table) = $validator->parseTable($parameters[0]);
            // The second parameter position holds the name of the column that needs to
            // be verified as unique. If this parameter isn't specified we will just
            // assume that this column to be verified shares the attribute's name.
            $column = isset($parameters[1])
                ? $parameters[1] : $validator->guessColumnForQuery($attribute);

            list($idColumn, $id) = [null, null];

            if (isset($parameters[2])) {
                list($idColumn, $id) = $validator->getUniqueIds($parameters);

                if (preg_match('/\[(.*)\]/', $id, $matches)) {
                    $id = $validator->getValue($matches[1]);
                }

                if (strtolower($id) == 'null') {
                    $id = null;
                }
            }

            // The presence verifier is responsible for counting rows within this store
            // mechanism which might be a relational database or any other permanent
            // data store like Redis, etc. We will use it to determine uniqueness.
            $verifier = $validator->getPresenceVerifier();

            $verifier->setConnection($connection);

            $extra = $validator->getUniqueExtra($parameters);

            return $verifier->getCount(

                $table, $column, $value, $id, $idColumn, $extra

            ) == 0;
        });

        Form::component('buttons', 'form.buttons', ['name', 'value', 'attributes' => [],]);
        Form::component('globalText', 'form.text', ['name', 'value', 'attributes' => [],]);
        Form::component('globalDate', 'form.date', ['name', 'value', 'attributes' => [],]);
        Form::component('globalSelect', 'form.select', ['name', 'options', 'value', 'attributes' => [],]);
        Form::component('globalCheckbox', 'form.checkbox', ['name', 'options', 'value', 'attributes' => [],]);
        Form::component('errors', 'form.errors', ['name', 'value' => null, 'attributes' => [],]);
        Form::component('import', 'form.import', ['name', 'value', 'attributes' => [],]);
        Html::component('exports', 'html.exports', ['name', 'value' => null, 'attributes' => [],]);
        Html::component('import', 'html.import', ['name', 'value', 'attributes' => [],]);
        Html::component('preview', 'html.preview', ['name', 'value', 'attributes' => [],]);
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
