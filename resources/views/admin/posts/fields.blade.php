<div class="form-group col-sm-12">
    {!! Form::label('title', trans('messages.title') . ':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('name', trans('messages.slug') . ':') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('content', trans('messages.content') . ':') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('excerpt', trans('messages.excerpt') . ':') !!}
    {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>
