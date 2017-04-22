    <div class="form-group col-sm-12">
        {!! Form::label('name', trans('messages.name') . ':') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('slug', trans('messages.slug') . ':') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('parent_id', trans('messages.parent') . ':') !!}
        {!! Form::select('parent_id', $parentCategories->prepend('None'), null, ['class' => 'form-control']) !!}
    </div>
