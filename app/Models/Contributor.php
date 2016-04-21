<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 20/04/2016
 * Time: 17:34
 */
class Contributor extends Model
{

    public $timestamps = false;

    public $fillable = [
      'name', 'last_name',
    ];

}