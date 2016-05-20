<?php

/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 17/05/2016
 * Time: 15:06
 */

namespace App\Parser;

abstract class Parser
{

    public static function parse(\Symfony\Component\HttpFoundation\File\File $file)
    {
        $xml = simplexml_load_file($file->getRealPath());
        return Parser::extractChildrenInfo($xml);
    }

    private static function extractChildrenInfo($children)
    {
        $data = [];


        if ($children->count() < 1) {
            return (string)$children;
        }


        foreach ($children->children() as $children) {
            if (!isset($data[$children->getName()])) {
                $data[$children->getName()] = [];
            }

            $data[$children->getName()][] = [
                'attributes' => Parser::extractAttributes($children),
                'value' => Parser::extractChildrenInfo($children)
            ];
        }

        return $data;
    }

    private static function extractAttributes($children)
    {
        $data = [];

        foreach ($children->attributes() as $name => $value) {
            $data[$name] = (string)$value;
        }

        return !empty($data) ? $data : null;
    }
}