<?php

namespace App\Interpreter;


use App\Parser\CSVParser;
use App\Parser\Parsers\XMLParser;
use App\Parser\TXTParser;

abstract class Interpreter
{

    protected $map;

    /**
     * @var \Symfony\Component\HttpFoundation\File\File $file
     */
    protected $file;
    protected $class;


    /**
     * @param \Symfony\Component\HttpFoundation\File\File $file
     * @return $this
     */
    public function forFile(\Symfony\Component\HttpFoundation\File\File $file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @param $class
     * @return $this
     */
    public function forClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $file
     * @return array
     */
    public function getContent()
    {
        $parser = $this->getParser();
        $res = $parser->parse($this->file);
        $lines = $this->transform($res['lines']);
        $lines = $this->simplify($lines);
        $exceptions = $res['exceptions'];
        $res = [$lines, $exceptions];
        return $this->interpret($res);
    }

    /**
     * @return CSVParser|XMLParser|TXTParser
     */
    protected function getParser()
    {
        if ($this->file->getMimeType() == 'application/xml') {
            return new XMLParser();
        }
        if ($this->file->getMimeType() == 'text/plain') {
            return new TXTParser();
        }

        return new CSVParser();
    }

    /**
     * @param $key
     * @return mixed
     */
    public function mapping($key)
    {
        return isset($this->map[$key]) ? $this->map[$key] : $key;
    }

    /**
     * Transform the given array into a interpretable one.
     *
     * @param array $tab
     * @return array
     */
    public function transform($tab = null)
    {
        if (!is_array($tab) || empty($tab)) {
            return $tab;
        }
        foreach ($tab as $key => $value) {
            $sanitize_value = $this->transform($value);
            if ($sanitize_value != null) {
                $res[$this->mapping($key)] = $sanitize_value;
            }
        }
        return $res;
    }

    /**
     * Simplify the given array by deleting all null values, and by narrowing as
     * mush as possible all the data.
     *
     * @param mixed $tab
     * @return array
     */

    protected function simplify($tab = null)
    {
        if (!is_array($tab) || empty($tab)) {
            return $tab;
        }
        if (is_array($tab) && count($tab) <= 1) {
            return $this->simplify(array_shift($tab));
        }
        foreach ($tab as $key => $value) {
            $res[$key] = $this->simplify($value);
        }
        return $res;
    }

    /**
     * If the given arg is an array then it will return a model if the array is correctly formed,
     * Else if the given arg is a model then it will return an array,
     * Else it will throw an exception
     *
     * @param \Illuminate\Database\Eloquent\Model | array $args
     * @return array | \Illuminate\Database\Eloquent\Model
     * @throws \Symfony\Component\Config\Definition\Exception\InvalidTypeException
     */
    abstract protected function interpret(array $args);


}