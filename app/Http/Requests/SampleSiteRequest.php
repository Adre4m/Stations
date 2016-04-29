<?php
/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 21/04/2016
 * Time: 10:41
 */

namespace App\Http\Requests;


use App\Models\SampleSite;
use Illuminate\Foundation\Http\FormRequest;
use Webpatser\Uuid\Uuid;

class SampleSiteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'  => 'required|max:255',
            'x'     => 'required|regex:"[-]?[0-9]{1,3}([.][0-9]{0,3})?"',
            'y'     => 'required|regex:"[-]?[0-9]{1,3}([.][0-9]{0,3})?"',
        ];
    }

    public function persist($sample_site = null)
    {
        if($sample_site == null)
        {
            $sample_site = new SampleSite;
            $sample_site->uuid = Uuid::generate(4);
        }
        $sample_site->name = $this->input('name');
        $sample_site->x = $this->input('x');
        $sample_site->y = $this->input('y');
        $sample_site->station_id = $this->input('station_id');
        return $sample_site->save();
    }
}