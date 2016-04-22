<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 20/04/2016
 * Time: 17:35
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Station
 *
 * @property integer $code
 * @property string $name
 * @property float $x
 * @property float $y
 * @property integer $contributor_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereX($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereY($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereContributorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Station extends Model
{

    protected $primaryKey = 'code';

    public function contributor()
    {
        return $this->belongsTo(Contributor::class);
    }

    public function stationLogs()
    {
        return $this->hasMany(StationLog::class);
    }

    public static function query()
    {
        return Station::with('contributor');
//        return Contributor::select([
//            'contributors.id as contributor_id',
//            'contributors.name as contributor_name',
//            'contributors.last_name as last_name',
//            'stations.code as code',
//            'stations.name as station_name',
//            'stations.x as x',
//            'stations.y as y',
//        ])
//            ->leftJoin('stations', 'contributor_id', '=', 'contributors.id')
//            ->newQuery();
//        return Station::select(['code', 'name', 'x', 'y', 'station_logs.msg as msg'])
//            ->leftJoin('station_logs', 'station_id', '=', 'stations.code')
//            ->newQuery();
    }
}