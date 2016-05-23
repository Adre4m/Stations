<?php

namespace App\Interpreter;


abstract class Interpreter
{

    protected $keyMap;

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $file
     * @return array
     */
    public function parse(\Symfony\Component\HttpFoundation\File\File $file)
    {
        $res = $this->transform(\App\Parser\Parser::parse($file));
        $res = $this->simplify($res);
        return $res;
    }

    /**
     * Transform the given array into a interpretable one.
     *
     * @param array $tab
     * @return array
     */
    abstract public function transform(array $tab);

    /**
     * Simplify the given array by deleting all null values, and by narrowing as
     * mush as possible all the data.
     *
     * @param array $tab
     * @return array
     */
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
    abstract public function interpret($arg);


}