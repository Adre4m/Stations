<?php

namespace App\Interpreter;

use App\Importable;
use App\Models\Contributor;
use App\Models\Station;
use Exception;

class TXTInterpreter extends \App\Interpreter\Interpreter
{

    protected $map = [];


    public $exceptions = [];

    /**
     * {@inheritdoc}
     */
    protected function interpret(array $lines)
    {
        /** @var Importable|\Illuminate\Database\Eloquent\Model $class */
        $class = $this->class;
        $models = array();
        foreach ($lines as $line) {
            // $line est un tableau (nom de propriété, valeur) représentant un objet à importer
            // instantiation d'un nouvel objet avec le type correspondant
            $model = new $class;
            try {
                // renseignement de chaque propriété
                foreach ($line as $property_name => $property_value) {
                    $model->{$property_name} = $property_value;
                }
                $existing_model = $class::whereCode($model->code)->get()->first();
                if(isset($existing_model) && $existing_model->exists) {
                    $model->id = $existing_model->id;
                    $model->exists = true;
                }
                $models[] = $model;
            } catch (Exception $e) {
                $this->exceptions[] = $e;
            }
        }
        return $models;
    }
}