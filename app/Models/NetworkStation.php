<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 28/04/2016
 * Time: 11:04
 */

namespace App\Models;


use App\Exportable;
use App\GenerateUuid;
use App\HasBusinessComposedKey;
use App\Importable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NetworkStation
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $station_id
 * @property integer $network_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $began_at
 * @property string $end_at
 * @property \App\Models\Station $station
 * @property \App\Models\Network $network
 * @property-read mixed $begin
 * @property-read mixed $end
 * @property-read mixed $business_key
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereNetworkId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereBeganAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereEndAt($value)
 * @mixin \Eloquent
 */
class NetworkStation extends Model
{

    use HasBusinessComposedKey, GenerateUuid, Importable, Exportable;

    protected $table = 'network_station';

    public static $header = [
        'station' => 'station',
        'network' => 'network',
        'began_at' => 'began_at',
        'end_at' => 'end_at',
    ];

    protected $business = [
        'station_id',
        'network_id',
        'began_at',
    ];

    public static $plural = 1;

    public static function rules(NetworkStation $networkStation = null)
    {
        $id = (isset($networkStation) && $networkStation->id != null) ? $networkStation->id : null;
        $network_id = (isset($networkStation) && $networkStation->network_id != null) ? $networkStation->network_id : null;
        $station_id = (isset($networkStation) && $networkStation->station_id != null) ? $networkStation->station_id : null;
        $began_at = (isset($networkStation) && $networkStation->began_at != null) ? $networkStation->began_at : null;
        return [
            'network_station-station_id' => [
                "unique:network_station,station_id,{$id},id,network_id,{$network_id},began_at,{$began_at}",
                "exists:stations,id"
            ],
            'network_station-network_id' => [
                "unique:network_station,network_id,{$id},id,station_id,{$station_id},began_at,{$began_at}",
                "exists:networks,id"
            ],
            'network_station-began_at' => [
                'required_without:network_station-file',
                'date',
                "unique:network_station,began_at,{$id},id,station_id,{$station_id},network_id,{$network_id}",
            ],
            'network_station-end_at' => [
                'date',
                'after:began_at',
            ],
        ];
    }

    public static function infoRules()
    {
        return [
            'network_station-began_at' => [
            ]
        ];
    }

    public static function warningRules()
    {
        return [
            'network_station-end_at' => [
                'required',
            ],
        ];
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function network()
    {
        return $this->belongsTo(Network::class);
    }

    public static function query()
    {
        return NetworkStation::select(['id', 'station_id', 'network_id', 'began_at', 'end_at'])
            ->with('station', 'network')->newQuery();
    }

    public function getBeginAttribute()
    {
        return Carbon::parse($this->began_at)->format('d/m/Y H:i:s');
    }

    public function getEndAttribute()
    {
        return Carbon::parse($this->end_at)->format('d/m/Y H:i:s');
    }

    public function setStationAttribute($value)
    {
        $station = Station::whereCode($value)->firstOrNew([]);
        if ($station->exists) {
            $this->station_id = $station->id;
        } else {
            $this->station_id = -1;
        }
    }

    public function setNetworkAttribute($value)
    {
        $network = Network::whereCode($value)->firstOrNew([]);
        if ($network->exists) {
            $this->network_id = $network->id;
        } else {
            $this->network_id = -1;
        }
    }
}