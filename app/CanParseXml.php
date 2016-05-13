<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 13/05/2016
 * Time: 12:04
 */

namespace App;


use Illuminate\Support\Str;

trait CanParseXml
{

    public static function read($value)
    {
        //Ca renverra un tableau :
        /**
         * EXEMPLE :
         * return [
         *      'Station' => [
         *          'code'    => 1234,
         *          'name'    => 'Name',
         *          'x'       => 1.2,
         *          'y'       => 2.1,
         *          'manager' => [
         *              'code'      => 4567,
         *              'name'      => 'Jean-Jacques',
         *              'last_name' => 'Poisseux',
         *          ],
         *          'owner'   => [
         *              'code'      => 7890,
         *              'name'      => 'Jean-Michel',
         *              'last_name' => 'Moustache',
         *          ],
         *      ],
         * ]
         */
        $value = preg_replace('/\r|\t/|<[?]xml version="1.0" encoding="UTF-8" standalone="yes" [?]>\r\n/', '', $value);
        //De cette facon ce sera par la suite facilement interpretable
        //Nous allons parcourir le fichier
        for($index = 0; $index < Str::length($value); ++$index)
        {
            // TODO interpreter ligne par ligne !
        }
    }
}