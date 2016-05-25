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
        dd($className);
        foreach($this->toArray() as $key => $value)
        {
            $array["$className-$key"] = $value;
        }
        $validator = \Validator::make($array, static::businessRules());

        if (!$validator->passes()) {
            session()->flash('warnings', $validator->errors());
        }
    }
}