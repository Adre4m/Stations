<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Contributor
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $code
 * @property string $name
 * @property string $last_name
 * @property string $siret
 * @property-read mixed $fullname
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Station[] $stations
 * @property-read mixed $business_key
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Contributor whereSiret($value)
 */
	class Contributor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Network
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $code
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\NetworkStation[] $stationNetworks
 * @property-read mixed $business_key
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Network whereUpdatedAt($value)
 */
	class Network extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NetworkStation
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $station_id
 * @property integer $network_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $began_at
 * @property string $end_at
 * @property-read \App\Models\Station $station
 * @property-read \App\Models\Network $network
 * @property-read mixed $begin
 * @property-read mixed $end
 * @property-read mixed $business_key
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereNetworkId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereBeganAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\NetworkStation whereEndAt($value)
 */
	class NetworkStation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SampleSite
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $code
 * @property string $name
 * @property float $x
 * @property float $y
 * @property integer $station_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Station $station
 * @property-read mixed $position
 * @property-read mixed $business_key
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereX($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereY($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereStationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SampleSite whereUpdatedAt($value)
 */
	class SampleSite extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Scenario
 *
 * @property integer $id
 * @property string $uuid
 * @property string $code
 * @property integer $version
 * @property string $name
 * @property string $began_at
 * @property string $end_at
 * @property integer $transmitter_id
 * @property integer $receiver_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Contributor $transmitter
 * @property-read \App\Models\Contributor $receiver
 * @property-read mixed $business_key
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Scenario whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Scenario whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Scenario whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Scenario whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Scenario whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Scenario whereBeganAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Scenario whereEndAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Scenario whereTransmitterId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Scenario whereReceiverId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Scenario whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Scenario whereUpdatedAt($value)
 */
	class Scenario extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Station
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $code
 * @property string $name
 * @property string $precise_location
 * @property float $x
 * @property float $y
 * @property integer $projection
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $hardness_class
 * @property integer $hydro_entity_code
 * @property integer $hydro_section_code
 * @property integer $town_code
 * @property integer $manager_id
 * @property integer $owner_id
 * @property-read \App\Models\Contributor $manager
 * @property-read \App\Models\Contributor $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SampleSite[] $sample_sites
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Network[] $networks
 * @property-read mixed $position
 * @property-read mixed $business_key
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station wherePreciseLocation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereX($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereY($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereProjection($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereHardnessClass($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereHydroEntityCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereHydroSectionCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereTownCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereManagerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Station whereOwnerId($value)
 */
	class Station extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $uuid
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUuid($value)
 */
	class User extends \Eloquent {}
}

