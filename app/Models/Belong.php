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
 * @property integer $station_id
 * @property integer $sample_site_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Belong whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Belong whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Belong whereSampleSiteId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Belong whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Belong whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Belong extends Model
{

}