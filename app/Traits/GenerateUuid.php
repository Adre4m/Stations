<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 10/05/2016
 * Time: 11:18
 */

namespace App;


use Webpatser\Uuid\Uuid;

/**
 * Class GenerateUuid
 * @package App
 */
trait GenerateUuid
{

    /**
     *
     */
    public static function bootGenerateUuid()
    {
        static::creating(function ($model) {
            $model->{$model->getUuidKey()} = Uuid::generate(4);
        });
    }

    /**
     * @return string
     */
    public function getUuidKey()
    {
        return (isset($this->uuid) && !empty($this->uuid)) ? $this->uuid : 'uuid';
    }


}