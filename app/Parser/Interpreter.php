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

    abstract protected function simplify(array $tab);



    /**
     * If the given arg is an array then it will return a model if the array is correctly formed,
     * Else if the given arg is a model then it will return an array,
     * Else it will throw an exception
     *
     * @param \Illuminate\Database\Eloquent\Model | array $arg
     * @return array | \Illuminate\Database\Eloquent\Model
     * @throws \Symfony\Component\Config\Definition\Exception\InvalidTypeException
     */
    abstract protected function interpret($arg);


}