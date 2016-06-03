<?php

namespace App\Models;

use App\Exportable;
use App\GenerateUuid;
use App\HasBusinessKey;
use App\Importable;
use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{

    use HasBusinessKey, GenerateUuid, Importable, Exportable;

    public $timestamps = false;

    /**
     * @return array
     */
    public static function rules(Contributor $contributor = null, $on = false)
    {
        $id = (isset($contributor) && $contributor->id != null) ? $contributor->id : 'null';
        return [
            "contributor-code" => [
                'required_without:contributor-file',
                "unique:contributors,code,{$id},id",
                ($on) ? 'siret' : '',
            ],
            "contributor-name" => [
                'required_without:contributor-file',
                'max:255',
            ],
            "contributor-last_name" => [
                'required_without:contributor-file',
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