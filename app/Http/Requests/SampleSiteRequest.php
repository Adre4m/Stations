<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;


use App\Importable;
use App\Interpreter\CSVInterpreter;
use App\Models\SampleSite;
use Illuminate\Foundation\Http\FormRequest;

class SampleSiteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return SampleSite::rules($this->sample_site);
    }

    public function persist($sample_site = null)
    {
        if ($sample_site == null) {
            $sample_site = new SampleSite;
        }
        if ($this->hasFile('sample_site-file')) {
            $interpreter = new CSVInterpreter();
            $res = $interpreter
                ->forFile($this->file('sample_site-file'))
                ->forClass(SampleSite::class)
                ->getContent();
            return Importable::validateCollection($res);
        } else {
            $sample_site->code = $this->input('sample_site-code');
            $sample_site->name = $this->input('sample_site-name');
            $sample_site->x = $this->input('sample_site-x');
            $sample_site->y = $this->input('sample_site-y');
            $sample_site->station_id = $this->input('sample_site-station_id');
            $sample_site->save();
        }
        return $sample_site;
    }
}