<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * 
 * User: Adrien
 * Date: 20/04/2016
 * Time: 17:34
 *
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereLastName($value)
 * @mixin \Eloquent
 */
class Contributor extends Model
{

    public $timestamps = false;

    public $fillable = [
      'name', 'last_name',
    ];


    public function getFullnameAttribute()
    {
        return "{$this->name} {$this->last_name}";
    }


    public static function query()
    {
        return Contributor::select(['id', 'name', 'last_name'])->newQuery();
    }

}