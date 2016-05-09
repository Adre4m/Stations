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
        $sample_site = $this->sample_site;
        $id = ($sample_site == null) ? null : $sample_site->id;
        return [
            'code'  => [
                'required',
                "unique:sample_sites,code,{$id},id",
            ],
            'name'  => [
                'required',
                'max:255',
            ],
            'x'     => [
                'required',
                'numeric',
                "unique:sample_sites,x,{$id},id,y,{$this->y}",
            ],
            'y'     => [
                'required',
                'numeric',
                "unique:sample_sites,y,{$id},id,x,{$this->x}",
            ],
        ];
    }

    public function persist($sample_site = null)
    {
        if($sample_site == null)
        {
            $sample_site = new SampleSite;
            $sample_site->uuid = Uuid::generate(4);
        }
        $sample_site->code = $this->code;
        $sample_site->name = $this->name;
        $sample_site->x = $this->x;
        $sample_site->y = $this->y;
        $sample_site->station_id = $this->station_id;
        return $sample_site->save();
    }
}