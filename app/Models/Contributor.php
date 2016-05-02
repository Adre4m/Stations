<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contributor
 *
 * @property integer $id
 * @property string $uuid
 * @property string $name
 * @property string $last_name
 * @property-read mixed $fullname
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereUuid($value)
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

    public function stations()
    {
        return $this->hasMany(Station::class, 'manager_id', 'owner_id');
    }


    public static function query()
    {
//        return Contributor::with('stations');
            return Contributor::select(['code', 'name', 'last_name', 'siret'])->with('stations');
    }

}