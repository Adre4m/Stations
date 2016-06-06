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
        $separator = ';';

        $txtData = file_get_contents($file->getRealPath());
        $lines = explode(PHP_EOL, $txtData);
        $header = explode($separator, array_shift($lines));
        $parsedLines = array();
        $lineNumber = 2;
        $exceptions = [];
        foreach ($lines as $line) {
            try {
                $values = array_combine($header, explode($separator, $line));
                $parsedLines[] = $values;
            } catch (\ErrorException $e) {
                $exceptions[] = "Ligne $lineNumber illisible : nombre de valeur incompatible";
            }
            $lineNumber++;
        }
        return ['lines' => $parsedLines, 'exceptions' => $exceptions];
    }
}