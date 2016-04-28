
@can('edit', $contributor)
    <a href="{{route('contributors.edit', $contributor->id)}}">
        <button class="btn btn-warning" type="button"><i class="fa fa-btn fa-edit"></i>{{trans('contributors.edit')}}</button>
    </a>
@endcan

@cannot('edit', $contributor)
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-btn fa-edit"></i>{{trans('contributors.edit')}}</button>
@endcannot

@can('destroy', $contributor)
    <a href="{{route('contributors.destroy', $contributor->id)}}">
        <button class="btn btn-danger" type="button"><i class="fa fa-btn fa-trash"></i>{{trans('contributors.destroy')}}</button>
    </a>
@endcan

@cannot('destroy', $contributor)
        <button class="btn btn-default" style="background-color: #aeaeae; color: #5e5e5e" type="button"><i class="fa fa-btn fa-trash"></i>{{trans('contributors.destroy')}}</button>
@endcannot