<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 17/05/2016
 * Time: 15:12
 */

namespace App\Parser\Parsers;

use App\Parser\Parser;

class XMLParser extends Parser
{
    public function parse(\Symfony\Component\HttpFoundation\File\File $file)
    {
        $xml = simplexml_load_file($file->getRealPath());
        return $this->extractChildrenInfo($xml);
    }

    private function extractChildrenInfo($children)
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
                'attributes' => $this->extractAttributes($children),
                'value' => $this->extractChildrenInfo($children)
            ];
        }

        return $data;
    }

    private function extractAttributes($children)
    {
        $data = [];

        foreach ($children->attributes() as $name => $value) {
            $data[$name] = (string)$value;
        }

        return !empty($data) ? $data : null;
    }
}