<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 17/05/2016
 * Time: 15:14
 */

namespace App\Parser;


class TXTParser extends Parser
{

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $file
     * @return mixed
     */
    public function parse(\Symfony\Component\HttpFoundation\File\File $file)
    {
        $txtData = file_get_contents($file->getRealPath());
        $lines = explode(PHP_EOL, $txtData);
        $header = explode(',', array_shift($lines));
        $array = array();
        foreach ($lines as $line) {
            $array[] = array_combine($header, explode(',', $line));
        }
        return $array;

    }
}