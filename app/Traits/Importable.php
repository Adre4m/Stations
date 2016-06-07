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

    public function validate()
    {
        $array = array();
        $className = snake_case(substr(static::class, 11));
        /** @var Importable|Model $this */
        foreach ($this->toArray() as $key => $value) {
            $array["$className-$key"] = $value;
        }
        $info = \Validator::make($array, static::infoRules());
        $warning = \Validator::make($array, static::warningRules());

        $error = \Validator::make($array, static::rules($this));
        session()->flash('info', $info->errors(), 'warnings', $warning->errors(), 'errors', $error->errors());
        return ['info' => $info->errors(), 'warnings' => $warning->errors(), 'errors' => $error->errors(),];
    }

    public static function saveCollection(array $collection)
    {
        $messages = [];
        $i = 0;
        $models = $collection['models'];
        /** @var Importable|Model $var */
        foreach ($models as $var) {
            $messages[] = [$var[0], $var[0]->validate()];
            if (count($messages[$i][1]['errors']->messages()) == 0) {
                $var[0]->save();
            }
            $i++;
        }
        return $messages;
    }

    public function validateCollection(array $collection)
    {
        $messages = [];
        $models = $collection['models'];
        /** @var Importable|Model $var */
        foreach ($models as $var) {
            $messages[] = [$var, $var->validate()];
        }
        return [
            'exceptions' => $collection['exceptions'],
            'models' => $messages
        ];
    }

    public static function infoRules()
    {
        return [];
    }

    public static function warningRules()
    {
        return [];
    }

    public static function rules($model)
    {
        return [];
    }

}