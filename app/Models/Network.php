<?php
/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 28/04/2016
 * Time: 17:53
 */

namespace App\Models;


use App\Exportable;
use App\GenerateUuid;
use App\HasBusinessKey;
use App\Importable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * App\Models\Network
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $code
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Collection|NetworkStation[] $stationNetworks
 * @property-read mixed $business_key
 * @method static Builder|Network whereId($value)
 * @method static Builder|Network whereUuid($value)
 * @method static Builder|Network whereCode($value)
 * @method static Builder|Network whereName($value)
 * @method static Builder|Network whereCreatedAt($value)
 * @method static Builder|Network whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Network extends Model
{

    use HasBusinessKey, GenerateUuid, Importable, Exportable;

    public static $header = [
        'code' => 'code',
        'name' => 'name',
    ];

    public static function rules(Network $network = null)
    {
        $id = (isset($network) && $network->id != null) ? $network->id : null;
        return [
            'network-code' => [
                'required_without:network-file',
                "unique:networks,code,{$id},id",
            ],
            'network-name'  => [
                'required_without:network-file',
                'max:255',
            ],
        ];
    }

    public function networkStations()
    {
        return $this->hasMany(NetworkStation::class);
    }

    public static function query()
    {
        return Network::select(['id', 'code', 'name'])->newQuery();
    }

}