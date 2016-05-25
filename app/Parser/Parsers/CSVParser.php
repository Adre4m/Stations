<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 17/05/2016
 * Time: 15:14
 */

namespace App\Parser;


class CSVParser extends Parser
{

    protected $has_header = true;


    /**
     * @param \Symfony\Component\HttpFoundation\File\File $file
     * @return mixed
     */
    public function parse(\Symfony\Component\HttpFoundation\File\File $file)
    {
        $csvData = file_get_contents($file->getRealPath());
        $lines = explode(PHP_EOL, $csvData);
        $array = array();

        if ($this->has_header == true) {
            $header = str_getcsv(array_shift($lines));
        }

        foreach ($lines as $line) {
            $data = str_getcsv($line);

            if(isset($header)) {
                $data = array_combine($header, $data);
            }

            $array[] = $data;

        }

        return $array;

    }
}