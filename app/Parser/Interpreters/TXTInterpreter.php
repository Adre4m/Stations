<?php

namespace App\Interpreter;

use App\Models\Contributor;
use App\Models\Station;

class TXTInterpreter extends \App\Interpreter\Interpreter
{

    protected $map = [

    ];


    /**
     * {@inheritdoc}
     */
    protected function interpret($args)
    {
        if (is_array($args)) {
            $models = array();
            foreach ($args as $arg) {
                $model = new $this->class;
                foreach($arg as $key => $value)
                {
                    $model->{$key} = $value;
                }
                $models[] = $model;
            }
            return $models;
        }
        return null;
    }
}