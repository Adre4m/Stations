<?php

namespace App\Models;

use App\GenerateUuid;
use App\HasBusinessKey;
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
 * @property integer $code
 * @property string $siret
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Station[] $stations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereSiret($value)
 * @property-read mixed $business_key
 */
class Contributor extends Model
{

    use HasBusinessKey, GenerateUuid;

    public $timestamps = false;

    /**
     * @return array
     */
    public static function rules(Contributor $contributor = null, $prefix = '')
    {
        $id = (isset($contributor) && $contributor->id != null) ? $contributor->id : 'null';
        return [
            "{$prefix}code" => [
                'required',
                "unique:contributors,code,{$id},id",
            ],
            "{$prefix}name" => [
                'required',
                'max:255',
            ],
            "{$prefix}last_name" => [
                'required',
                'max:255',
            ],
            "{$prefix}siret" => [
                'siret',
                "unique:contributors,siret,{$id},id",
            ],
        ];
    }

    public
    function getFullnameAttribute()
    {
        return "{$this->name} {$this->last_name}";
    }

    public
    function stations()
    {
        return $this->hasMany(Station::class, 'manager_id', 'owner_id');
    }


    public
    static function query()
    {
        return Contributor::select(['id', 'code', 'name', 'last_name', 'siret'])->with('stations')->newQuery();
    }

}