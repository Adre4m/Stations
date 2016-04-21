<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 20/04/2016
 * Time: 17:35
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Station extends Model
{

    protected $primaryKey = 'code';

    protected $relations = [
        'station_logs', 'contributors',
    ];

    public static function query()
    {
        return Station::select(['code', 'name', 'x', 'y', 'station_logs.msg as msg'])
            ->leftJoin('station_logs', 'station_id', '=', 'stations.code')->newQuery();
                /*'station_logs.msg as msg',
                'station_logs.created_at as update'*/

    }
}