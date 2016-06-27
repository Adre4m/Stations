<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 10/05/2016
 * Time: 10:56
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

trait Importable
{

    public static function validateCollection(array $collection)
    {
        $messages = [];
        $models = $collection['models'];
        /** @var Importable|Model $var */
        $i = 0;
        foreach ($models as $var) {
            $messages[] = [$var, $var->validate()];
            if (count($messages[$i][1]['errors']->messages()) == 0) {
                $var->save();
            }
        }
        return [
            'exceptions' => $collection['exceptions'],
            'models' => $messages
        ];
    }

    public function validate()
    {
        $array = array();
        $className = snake_case(substr(static::class, strlen('App\\Models\\')));
        /** @var Importable|Model $this */
        foreach ($this->toArray() as $key => $value) {
            $array["$className-$key"] = $value;
        }
        $info = \Validator::make($array, static::infoRules());
        $warning = \Validator::make($array, static::warningRules());

        $error = \Validator::make($array, static::rules($this));
        return ['info' => $info->errors(), 'warnings' => $warning->errors(), 'errors' => $error->errors(),];
    }

    public static function infoRules()
    {
        return [];
    }

    public static function warningRules()
    {
        return [];
    }

    /**
     * @param null $model
     * @return array
     */
    public static function rules($model = null)
    {
        return [];
    }

}