
<a href="/stations/edit{{$station->code}}">
    <button class="btn btn-warning" type="button"><i class="fa fa-btn fa-edit"></i>{{trans('stations.edit')}}</button>
</a>
@can('destroy', $station)
    <a href="/stations/destroy{{$station->code}}">
        <button class="btn btn-danger" type="button"><i class="fa fa-btn fa-trash"></i>{{trans('stations.destroy')}}</button>
    </a>
@endcan