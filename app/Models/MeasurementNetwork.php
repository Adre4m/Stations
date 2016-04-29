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
 * App\Models\MeasurementNetwork
 *
 * @property integer $id
 * @property string $uuid
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $began_at
 * @property string $end_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Belong[] $stations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MeasurementNetwork whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MeasurementNetwork whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MeasurementNetwork whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MeasurementNetwork whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MeasurementNetwork whereBeganAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MeasurementNetwork whereEndAt($value)
 * @mixin \Eloquent
 */
class MeasurementNetwork extends Model
{


    public function stations()
    {
        return $this->hasMany(Belong::class);
    }
}