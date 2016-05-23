<?php

namespace App\Models;

use App\GenerateUuid;
use App\HasBusinessKey;
use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{

    use HasBusinessKey, GenerateUuid;

    public $timestamps = false;

    /**
     * @return array
     */
    public static function rules(Contributor $contributor = null, $prefix = '', $on = false)
    {
        $id = (isset($contributor) && $contributor->id != null) ? $contributor->id : 'null';
        return [
            "{$prefix}code" => [
                'required',
                "unique:contributors,code,{$id},id",
                ($on) ? 'siret' : '',
            ],
            "{$prefix}name" => [
                'required',
                'max:255',
            ],
            "{$prefix}last_name" => [
                'required',
                'max:255',
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