<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 20/04/2016
 * Time: 17:36
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class StationLog extends Model
{

    protected $relations = [
      'stations',
    ];
}