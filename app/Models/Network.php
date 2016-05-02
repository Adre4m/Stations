<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 28/04/2016
 * Time: 17:53
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Network
 *
 * @property integer $id
 * @property string $uuid
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $began_at
 * @property string $end_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StationNetwork[] $stations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereBeganAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereEndAt($value)
 * @mixin \Eloquent
 */
class Network extends Model
{


    public function stationNetworks()
    {
        return $this->hasMany(StationNetwork::class);
    }

    public static function query()
    {
        return Network::select(['code', 'name'])->with('stationNetworks');
    }

}