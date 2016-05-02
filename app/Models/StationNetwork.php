<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 28/04/2016
 * Time: 11:04
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StationNetwork
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $station_id
 * @property integer $measurement_network_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Station $station
 * @property-read \App\Models\Network $measurement_network
 * @method static \Illuminate\Database\Query\Builder|\App\Models\StationNetwork whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\StationNetwork whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\StationNetwork whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\StationNetwork whereNetworkId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\StationNetwork whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\StationNetwork whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StationNetwork extends Model
{

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function network() {
        return $this->belongsTo(Network::class);
    }

    public static function query()
    {
        return StationNetwork::select('station_id', 'network_id', 'began_at')->with('station', 'network')->newQuery();
    }

}