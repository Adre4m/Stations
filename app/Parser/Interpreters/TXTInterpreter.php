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
        $x = null;
        $y = null;
        if (is_array($args)) {
            $models = array();
            foreach ($args as $arg) {
                $model = new $this->class;
                foreach ($arg as $key => $value) {
                    $model->{$key} = $value;
                    if($key == 'x') {
                        $x = $value;
                    }
                    if($key == 'y') {
                        $y = $value;
                    }
                }
                $models[] = $model;
            }
            return $models;
        }
        return null;
    }
}