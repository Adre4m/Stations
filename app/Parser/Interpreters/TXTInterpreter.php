<?php

namespace App\Interpreter;

use App\Models\Contributor;
use App\Models\Scenario;
use App\Models\Station;
use Symfony\Component\Config\Definition\Exception\InvalidTypeException;

class TXTInterpreter extends \App\Interpreter\Interpreter
{

    protected $map = [

    ];


    /**
     * {@inheritdoc}
     */
    public function interpret($args)
    {
        if(is_array($args)) {
            $stations = array();
            foreach($args as $arg) {
                $manager = Contributor::find($arg['manager_id']);
                $owner = Contributor::find($arg['owner_id']);
                $station = new Station($arg);
                $station->manager_id = $manager->id;
                $station->owner_id = $owner->id;
                $stations[] = $station;
            }
            return array_shift($stations);
        }
    }
}