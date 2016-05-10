<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 10/05/2016
 * Time: 10:56
 */

namespace App;

trait HasBusinessKey
{

    public function getBusinessKeyAttribute()
    {
        // on récupère le nom de l'attribut qui porte la clef métier
        $keyAttributeName = $this->getBusinessKey();

        // on renvoie la valeur
        // c# : this.GetType().GetProperty(keyAttributeName).GetValue(this, null);
        return $this->{$keyAttributeName};
    }

    public function getBusinessKey()
    {
        return (isset($this->business) && !empty($this->business))? $this->business : 'code';
    }
}