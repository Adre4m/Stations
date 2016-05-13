<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;


use App\Models\Contributor;
use App\Models\Station;
use Illuminate\Foundation\Http\FormRequest;
use Orchestra\Parser\Xml;

class StationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Station::rules($this->station, 'station-', $this->x, $this->y);
    }

    /**
     * @param null $station
     * @return $this|bool
     */
    public function persist($station = null)
    {

        /** @var \App\Models\Station $station */
        if ($station == null) {
            $station = new Station;
        }
        if ($this->hasFile('station-file')) {
            $file = $this->file('station-file');
            $xml = \XmlParser::load($file->getRealPath());
            $info = $xml->parse([
                'station-code' => ['uses' => 'code'],
                'station-name' => ['uses' => 'name'],
                'station-x' => ['uses' => 'x'],
                'station-y' => ['uses' => 'y'],
                'manager.code' => ['uses' => 'manager.code'],
                'manager.name' => ['uses' => 'manager.name'],
                'manager.last_name' => ['uses' => 'manager.last_name'],
                'manager.siret' => ['uses' => 'manager.siret'],
                'owner.code' => ['uses' => 'owner.code'],
                'owner.name' => ['uses' => 'owner.name'],
                'owner.last_name' => ['uses' => 'owner.last_name'],
                'owner.siret' => ['uses' => 'owner.siret'],
            ]);

            $manager = Contributor::where([
                'code' => $info['manager.code'],
            ])
                ->get()->first();
            if ($manager == null) {
                $manager = new Contributor;
                $manager->code = $info['manager.code'];
            }
            $manager->name = $info['manager.name'];
            $manager->last_name = $info['manager.last_name'];
            $manager->siret = $info['manager.siret'];
            $validator = \Validator::make($manager->attributesToArray(), Contributor::rules());
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors([
                        'station-file' => $validator->errors()
                    ]);
            }
            $owner = Contributor::where([
                'code' => $info['owner.code'],
            ])
                ->get()->first();
            if ($owner == null) {
                $owner = new Contributor;
                $owner->code = $info['owner.code'];
            }
            $owner->name = $info['owner.name'];
            $owner->last_name = $info['owner.last_name'];
            $owner->siret = $info['owner.siret'];
            $validator = \Validator::make($owner->attributesToArray(), Contributor::rules());
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors([
                        'station-file' => $validator->errors()
                    ]);
            }

            $station = Station::where([
                'code' => $info['station-code'],
            ])->get()->first();
            if ($station == null) {
                $station = new Station;
                $station->code = $info['station-code'];
            }
            $station->name = $info['station-name'];
            $station->x = $info['station-x'];
            $station->y = $info['station-y'];
            $validator = \Validator::make($station->attributesToArray(), Station::rules($station));
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors([
                        'station-file' => $validator->errors()
                    ]);
            }
            $manager->save();
            $owner->save();
            $station->manager()->associate($station);
            $station->owner()->associate($station);
            $station->manager_id = $manager->id;
            $station->owner_id = $owner->id;
            return $station->save();
        } else {
            $station->code = $this->input('station-code');
            $station->name = $this->input('station-name');
            $station->x = $this->input('station-x');
            $station->y = $this->input('station-y');
            $station->manager_id = $this->input('station-manager_id');
            $station->owner_id = $this->input('station-owner_id');
            return $station->save();
        }
    }
}