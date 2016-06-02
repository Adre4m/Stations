<?php

namespace App\Interpreter;

use App\Models\Contributor;
use App\Models\Station;
use Exception;

class TXTInterpreter extends \App\Interpreter\Interpreter
{

    protected $map = [

    ];


    protected $exceptions = [];

    public function GetExceptions(){
        return $this->exceptions;
    }


    /**
     * {@inheritdoc}
     */
    protected function interpret(array $args)
    {
        $models = array();
        foreach ($args as $arg) {
            // $arg est un tableau (nom de propriété, valeur) représentant un objet à importer
            // instantiation d'un nouvel objet avec le type correspondant
            $model = new $this->class;
            try {
                // renseignement de chaque propriété
                foreach ($arg as $property_name => $property_value) {
                    $model->{$property_name} = $property_value;
                }
                $models[] = $model;
            }catch(Exception $e){
                $this->exceptions[] = $e;
            }
        }
        return $models;
    }
}