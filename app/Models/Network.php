<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 28/04/2016
 * Time: 17:53
 */

namespace App\Models;


use App\Exportable;
use App\GenerateUuid;
use App\HasBusinessKey;
use App\Importable;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{

    use HasBusinessKey, GenerateUuid, Importable, Exportable;

    public static function rules(Network $network = null)
    {
        $id = (isset($network) && $network->id != null) ? $network->id : null;
        return [
            'network-code' => [
                'required_without:network-file',
                "unique:networks,code,{$id},id",
            ],
            'network-name'  => [
                'required_without:network-file',
                'max:255',
            ],
        ];
    }

    public function stationNetworks()
    {
        return $this->hasMany(NetworkStation::class);
    }

    public static function query()
    {
        return Network::select(['id', 'code', 'name'])->newQuery();
    }

}