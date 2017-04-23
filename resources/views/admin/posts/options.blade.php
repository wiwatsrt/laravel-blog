<div class="form-group col-sm-12">
    {!! Form::label('category_id', trans('messages.category') . ':') !!}
    {!! Form::select('category_id', $postCategories, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('status_id', trans('messages.status') . ':') !!}
    {!! Form::select('status_id', $postStatuses, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('publish_date', trans('messages.publish_date') . ':') !!}
</div>
<div class="form-group col-sm-12">
    <div class="row">
        <div class="col-xs-6">
            {!! Form::text('publish_date_at', !isset($post) ? \L5Starter\Core\Support\DateFormatter::format() : null, ['class' => 'form-control', 'id' => 'publish_date_at', 'autocomplete' => 'off']) !!}
        </div>
        <div class="col-xs-3">
            {!! Form::number('publish_hour', !isset($post) ? Date('H') : null, ['class' => 'form-control', 'id' => 'publish_hour']) !!}
        </div>
        <div class="col-xs-3">
            {!! Form::number('publish_minute', !isset($post) ? Date('i') : null, ['class' => 'form-control', 'id' => 'publish_minute']) !!}
        </div>
    </div>
</div>

@section('custom_js')
    $("#publish_date_at").datepicker({format: '{{ config('settings.datepickerFormat') }}', autoclose: true});
@endsection