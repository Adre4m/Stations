<?php

namespace App\Parser;

abstract class Parser
{

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $file
     * @return mixed
     */
    abstract public function parse(\Symfony\Component\HttpFoundation\File\File  $file);
}