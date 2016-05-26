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
            $stations = array();
            foreach ($args as $arg) {
                $manager = Contributor::whereCode($arg['manager'])->firstOrFail();
                $owner = Contributor::whereCode($arg['owner'])->firstOrFail();
                $station = new Station($arg);
                $station->code = $arg['station'];
                $station->manager_id = $manager->id;
                $station->owner_id = $owner->id;
                $stations[] = $station;
            }
            return $stations;
        }
        return null;
    }
}