<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 17/05/2016
 * Time: 15:14
 */

namespace App\Parser;


use Symfony\Component\HttpFoundation\File\File;

class CSVParser extends Parser
{

    /**
     * @param File $file
     * @return mixed
     */
    public function parse(File $file)
    {
        $separator = ';';

        $txtData = file_get_contents($file->getRealPath());
        $lines = explode(PHP_EOL, $txtData);
        // TODO here the header should be transformed, but I don't need it now
        $header = explode($separator, array_shift($lines));
        $parsedLines = array();
        $lineNumber = 2;
        $exceptions = [];
        foreach ($lines as $line) {
            try {
                $values = array_combine($header, explode($separator, $line));
                $parsedLines[] = $values;
            } catch (\ErrorException $e) {
                $exceptions[] = trans('validation.exceptions.unreadable_line',
                    ['lineNumber' => $lineNumber]);
            }
            $lineNumber++;
        }
        return ['lines' => $parsedLines, 'exceptions' => $exceptions];
    }
}