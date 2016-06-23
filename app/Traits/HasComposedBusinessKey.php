<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 10/05/2016
 * Time: 10:56
 */

namespace App;

trait HasBusinessComposedKey
{

    public function getBusinessKeyAttribute()
    {
        $values = array();
        foreach ($this->getBusinessKey() as $businessKeyName) {
            $values[$businessKeyName] = $this->{$businessKeyName};
        }
        return $values;
    }

    public function getBusinessKey()
    {
        return (isset($this->business) && !empty($this->business)) ? $this->business : null;
    }
}