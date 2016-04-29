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
 * App\Models\Belong
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $station_id
 * @property integer $measurement_network_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Station $station
 * @property-read \App\Models\MeasurementNetwork $measurement_network
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Belong whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Belong whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Belong whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Belong whereMeasurementNetworkId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Belong whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Belong whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Belong extends Model
{

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function measurement_network() {
        return $this->belongsTo(MeasurementNetwork::class);
    }

}