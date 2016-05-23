<?php

namespace App\Interpreter;

use App\Models\Contributor;
use App\Models\Scenario;
use Symfony\Component\Config\Definition\Exception\InvalidTypeException;

class QUESUInterpreter extends \App\Interpreter\Interpreter
{

    protected $map = [
        'Scenario' => 'scenario',
        'CodeScenario' => 'code',
        'VersionScenario' => 'version',
        'NomScenario' => 'name',
        'DateCreationFichier' => 'created_at',
        'DateDebutReference' => 'began_at',
        'DateFinReference' => 'end_at',
        'Emetteur' => 'transmitter',
        'CdIntervenant' => 'code',
        'NomIntervenant' => 'name',
        'Destinataire' => 'receiver',
        'schemeAgencyID' => 'scheme',

        'StationMesure' => 'station',
        'CdStationMesureEauxSurface' => 'code',
        'LbStationMesureEauxSurface' => 'name',
        'LocPreciseStationMesureEauxSurface' => 'precise_location',
        'CoordXStationMesureEauxSurface' => 'x',
        'CoordYStationMesureEauxSurface' => 'y',
        'ProjStationMesureEauxSurface' => 'projection',
        'DateCreationStationMesureEauxSurface' => 'created_at',
        'DateMAJInfosStationMesureEauxSurface' => 'updated_at',
        'ClasseDurete' => 'hardness_class',
        'EntiteHydrographique' => 'hydro_entity',
        'CdEntiteHydrographique' => 'code',
        'TronconEntiteHydrographiquePrincipale' => 'hydro_section',
        'CdTronconHydrographique' => 'code',
        'CommuneRattachee' => 'town',
        'CdCommune' => 'code',
        'PointPrel' => 'sample_site',
        'CdPointEauxSurf' => 'code',
        'CoordXPointEauxSurf' => 'x',
        'CoordYPointEauxSurf' => 'y',
        'Support' => 'support',
        'CdSupport' => 'code',
    ];

    public function transform(array $tab)
    {
        $res = [];
        foreach ($tab as $key => $value) {
            if (is_array($value)) {
                $value = $this->transform($value);
            }
            $res[$this->mapping($key)] = $value;
        }
        $res = array_where($res, function ($key, $value) {
            return $this->not_null($value);
        });
        return $res;
    }

    public function mapping($key)
    {
        if (is_numeric($key)) {
            return $key;
        }
        return isset($this->map[$key]) ? $this->map[$key] : $key;
    }

    private function not_null($value)
    {
        if (isset($value) && is_array($value)) {
            foreach ($value as $key => $var) {
                $this->not_null($var);
            }
        }
        return isset($value);
    }

    protected function simplify(array $tab)
    {
        $res = [];
        foreach ($tab as $key => $value) {
            if (is_array($value)) {
                // Cas 1 : chiffre inutile
                if (isset($value[0]) && !isset($value[1])) {
                    $value = $value[0];
                } else {
                    // Cas 4 : plusieurs chiffre
                    $value = $this->simplify($value);
                }
                if (isset($value['value'])) {
                    // Cas 5 : cas ou la clé a et une valeur et un attribut, auquel cas on laisse egalement value.
                    if (isset($value['attributes'])) {
                        $value = array_merge($value['attributes'],
                            is_array($value['value']) ? $value['value'] : ['value' => $value['value']]);
                    } else {
                        // Cas 2 : cas ou value est un tableau : simplifier le tableau
                        if (is_array($value['value'])) {
                            $value = $this->simplify($value['value']);
                        } else {
                            // Cas 3 : cas ou value est la valeur
                            $value = $value['value'];
                        }
                    }
                }
            }
            $res[$key] = $value;
        }
        return $res;
    }

    /**
     * {@inheritdoc}
     */
    public function interpret($arg)
    {
        if (is_array($arg)) {
            if (!isset($arg['scenario']) || !isset($arg['station'])) {
                throw new InvalidTypeException;
            }
            $scenario = new Scenario;
            $scenario->fill($arg['scenario']);
            $contributors = [];
            foreach($arg['scenario'] as $key => $value) {
                if($key == 'transmitter' || $key == 'receiver') {
                    $siret = $arg['scenario'][$key]['code']['scheme'] == 'SIRET';
                    $code = $arg['scenario'][$key]['code']['value'];
                    if ($siret) {
                        $code = substr($code, 0, 3) . ' ' . substr($code, 3, 3) . ' ' . substr($code, 6, 3) . ' ' . substr($code, 9, 5);
                    }
                    $contributor = Contributor::whereCode($code)->first();
                    if($contributor == null) {
                        return redirect()->back()->withErrors(507);
                    }
                    $contributors[$key] = $contributor->id;
                }
            }
            $scenario->transmitter_id = $contributors['transmitter'];
            $scenario->receiver_id = $contributors['receiver'];
            return $scenario;
        } else if ($arg instanceof \Illuminate\Database\Eloquent\Model) {
            return null;
        } else {
            return redirect()->back()->withErrors(401);
        }
    }
}