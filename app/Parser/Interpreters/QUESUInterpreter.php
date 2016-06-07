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

    /**
     * {@inheritdoc}
     */
    public function interpret(array $arg)
    {
        if (is_array($arg)) {
            if (!isset($arg['scenario']) || !isset($arg['station'])) {
                throw new InvalidTypeException;
            }
            $scenario = new Scenario;
            $scenario->fill($arg['scenario']);
            $contributors = [];
            foreach ($arg['scenario'] as $key => $value) {
                if ($key == 'transmitter' || $key == 'receiver') {
                    $siret = $arg['scenario'][$key]['code']['scheme'] == 'SIRET';
                    $code = $arg['scenario'][$key]['code']['value'];
                    if ($siret) {
                        $code = substr($code, 0, 3) . ' ' . substr($code, 3, 3) . ' ' . substr($code, 6, 3)
                            . ' ' . substr($code, 9, 5);
                    }
                    $contributor = Contributor::whereCode($code)->first();
                    if ($contributor == null) {
                        return redirect()->back()->withErrors(409);
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
            return redirect()->back()->withErrors(415);
        }
    }
}