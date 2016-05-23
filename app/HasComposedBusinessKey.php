<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 10/05/2016
 * Time: 10:56
 */

namespace App;

trait HasComposedBusinessKey
{

    public function getComposedBusinessKeyAttribute()
    {
        return $this->{$this->getBusinessKey()};
    }

    public function getBusinessKey()
    {
        return (isset($this->business) && !empty($this->business))? $this->business : 'code';
    }
}