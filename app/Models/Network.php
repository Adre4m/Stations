<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 28/04/2016
 * Time: 17:53
 */

namespace App\Models;


use App\GenerateUuid;
use App\HasBusinessKey;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{

    use HasBusinessKey, GenerateUuid;

    public function stationNetworks()
    {
        return $this->hasMany(NetworkStation::class);
    }

    public static function query()
    {
        return Network::select(['id', 'code', 'name'])->newQuery();
    }

}