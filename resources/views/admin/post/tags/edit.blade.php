@extends('l5starter::admin.layouts.master')

@section('content-header')
    <h1>
        Tags
    </h1>
@stop

@section('content')

    @include('l5starter::common.errors')

    <div class="box">
        <div class="box-header with-border">
            <h1 class="box-title">Edit Tag</h1>
        </div>
        <div class="box-body">
            {!! Form::model($postTag, ['route' => ['admin.post.tags.update', $postTag->id], 'method' => 'patch']) !!}
            <div class="row">
                @include('admin.post.tags.fields')
                <div class="form-group col-sm-12">
                    <a href="{!! route('admin.post.tags.index') !!}" class="btn btn-default btn-flat">{{ trans('l5starter::button.cancel') }}</a>
                    {!! Form::submit(trans('l5starter::button.update'), ['class' => 'btn btn-primary btn-flat']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection