<?php

namespace App\Interpreter;


abstract class Interpreter
{

    protected $keyMap;

    public function parse(\Symfony\Component\HttpFoundation\File\File $file)
    {
        $res = $this->transform(\App\Parser\Parser::parse($file));
        $res = $this->simplify($res);
        return $res;
    }

    abstract public function transform(array $tab);

    abstract public function simplify(array $tab);
}