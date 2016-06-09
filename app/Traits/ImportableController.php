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
        $controller_namespace = 'App\\Http\\Controllers\\';
        $controller = 'Controller';
        $models_namespace = 'App\\Models';

        $className = substr(static::class, strlen($controller_namespace));
        $className = substr($className, 0, strlen($className) - strlen($controller));
        $sessionFile = snake_case($className);
        $className = "$models_namespace\\$className";
        /** @var Importable $className */
        $plural = isset($className::$plural) ? $className::$plural : 2;
        $sessionFile = str_plural($sessionFile, $plural);
        $models = $className::saveCollection(session($sessionFile));
        return view("$sessionFile.import")->with('messages', $models);
    }

}