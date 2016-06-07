<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 20/04/2016
 * Time: 17:36
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * StationLog
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $msg
 * @property integer $station_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\StationLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\StationLog whereMsg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\StationLog whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\StationLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\StationLog whereUpdatedAt($value)
 */
class StationLog extends Model
{

    protected $relations = [
      'stations',
    ];
}