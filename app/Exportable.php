<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 01/06/2016
 * Time: 14:40
 */

namespace App;


trait Exportable
{

    protected function getArray()
    {
        $header = $this->toArray();
        $header = $this->filter($header);
        return $header;
    }

    public function toXML()
    {

    }

    protected function filter($header)
    {
        $header = array_where($header, function ($key, $value) {
            return $key != 'id' && $key != 'uuid' && $key != 'created_at' && $key != 'updated_at';
        });
        $filter_header = array();
        foreach ($header as $key => $value) {
            if (str_contains($key, 'id')) {
                $key = substr($key, 0, strpos($key, '_id'));
                $value = $this->{$key}->business_key;
            }
            $filter_header[$key] = $value;
        }
        return $filter_header;
    }

    public static function toCsv()
    {
        $models = static::all();
        if (count($models) == 0) {
            return false;
        }
        $file_name = snake_case(str_plural(substr(static::class, 11))) .
            ".csv";
        $file = fopen($file_name, 'w');
        $content = null;
        foreach ($models as $model) {
            $lines[] = $model->getArray();
        }
        foreach ($lines as $line) {
            $header = null;
            $values = null;
            foreach ($line as $key => $value) {
                $header .= "$key,";
                $values .= "$value,";
            }
            $header = substr($header, 0, strlen($header) - 1);
            $values = substr($values, 0, strlen($values) - 1);
            if ($content == null) {
                $content .= "$header\r\n";
            }
            $content .= "$values\r\n";
        }
        $content = substr($content, 0, strlen($content) - 2);
        fwrite($file, $content);
        return response()->download($file_name);
    }
}