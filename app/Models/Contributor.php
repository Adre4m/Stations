<?php

namespace App\Models;

use App\Exportable;
use App\GenerateUuid;
use App\HasBusinessKey;
use App\Importable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contributor
 *
 * @property integer $id
 * @property string $uuid
 * @property string $code
 * @property string $name
 * @property string $last_name
 * @property string $scheme
 * @property-read mixed $fullname
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Station[] $stations
 * @property-read mixed $business_key
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereScheme($value)
 * @mixin \Eloquent
 */
class Contributor extends Model
{

    use HasBusinessKey, GenerateUuid, Importable, Exportable;

    public $timestamps = false;

    public static $header = [
        'code' => 'code',
        'name' => 'name',
        'last_name' => 'last_name',
        'scheme' => 'scheme',
    ];

    /**
     * @param Contributor $contributor
     * @return array
     */
    public static function rules(Contributor $contributor = null)
    {
        $id = (isset($contributor) && $contributor->id != null) ? $contributor->id : 'null';
        return [
            "contributor-code" => [
                'required_without:contributor-file',
                "unique:contributors,code,{$id},id",
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

    public static function infoRules()
    {
        return [
        ];
    }

    public static function warningRules()
    {
        return [
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
        return Contributor::select(['id', 'code', 'name', 'last_name', 'scheme'])->with('stations')->newQuery();
    }

}