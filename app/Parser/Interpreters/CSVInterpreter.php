<?php

namespace App\Interpreter;

use App\Importable;
use Exception;
use Illuminate\Database\Eloquent\Model;

class CSVInterpreter extends Interpreter
{

    protected $map = [];

    /**
     * {@inheritdoc}
     */
    protected function interpret(array $lines)
    {
        /** @var Importable|Model $class */
        $class = $this->class;
        $models = array();
        $exceptions = $lines[1];
        $lines = $lines[0];
        foreach ($lines[0] as $key => $value) {
            /** @var array $header */
            if (!isset($class::$header[$key])) {
                $exceptions[] = trans('validation.exceptions.unreadable_file');
                return ['models' => $models, 'exceptions' => $exceptions];
            }
        }
        foreach ($lines as $line) {
            // $line est un tableau (nom de propriété, valeur) représentant un objet à importer
            // instantiation d'un nouvel objet avec le type correspondant
            $model = new $class;
            try {
                // renseignement de chaque propriété
                foreach ($line as $property_name => $property_value) {
                    $model->{$property_name} = $property_value;
                }
                if (is_array($model->business_key)) {
                    $existing_model = $class::where($model->business_key)->get()->first();
                } else {
                    $existing_model = $class::where($model->GetBusinessKey(), '=', $model->business_key)
                        ->get()
                        ->first();
                }
                if (isset($existing_model) && $existing_model->exists) {
                    $model->id = $existing_model->id;
                    $model->exists = true;
                }
                $models[] = $model;
            } catch (Exception $e) {
                $exceptions[] = $e;
            }
        }
        return ['models' => $models, 'exceptions' => $exceptions];
    }
}