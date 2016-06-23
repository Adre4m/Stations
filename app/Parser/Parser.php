<?php

namespace App\Parser;

use Symfony\Component\HttpFoundation\File\File;

abstract class Parser
{

    /**
     * @param File $file
     * @return mixed
     */
    abstract public function parse(File $file);
}