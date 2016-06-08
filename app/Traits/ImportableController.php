<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 10/05/2016
 * Time: 10:56
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

trait ImportableController
{

    public function import()
    {
        $className = substr(static::class, 21);
        $className = substr($className, 0, strlen($className) - 10);
        $sessionFile = snake_case($className);
        $className = "App\\Models\\$className";
        $plural = 2;
        /** @var Importable $className */
        if(isset($className::$plural)) {
            $plural = $className::$plural;
        }
        $sessionFile = str_plural($sessionFile, $plural);
        $models = $className::saveCollection(session($sessionFile));
        return view("$sessionFile.import")->with('messages', $models);
    }

}