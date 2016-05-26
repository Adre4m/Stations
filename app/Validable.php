<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 10/05/2016
 * Time: 10:56
 */

namespace App;

trait Validatable
{
    public function validate()
    {
        $array = array();
        $className = snake_case(substr(static::class, 11));
        foreach ($this->toArray() as $key => $value) {
            $array["$className-$key"] = $value;
        }
        $info = \Validator::make($array, static::infoRules());
        if (!$info->passes()) {
            session()->flash('infos', $info->errors());
        }

        $warning = \Validator::make($array, static::warningRules());
        if (!$warning->passes()) {
            session()->flash('warnings', $warning->errors());
        }

        $error = \Validator::make($array, static::rules($this));
        if (!$error->passes()) {
            session()->flash('error', $error->errors());
        }
        session()->flash('info', $info->errors(), 'warnings', $warning->errors(), 'errors', $error->errors());
        return ['info' => $info->errors(), 'warnings' => $warning->errors(), 'errors' => $error->errors(),];
    }

    public function validateCollection(array $collection)
    {
        $messages = [];
        foreach ($collection as $var) {
            $messages[] = $var->validate();
        }
        session('messages', $messages);
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