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
            <h1 class="box-title">Add New Tags</h1>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => 'admin.post.tags.store']) !!}
            <div class="row">
                @include('admin.post.tags.fields')
                <div class="form-group col-sm-12">
                    {!! Form::submit(trans('l5starter::button.save'), ['class' => 'btn btn-primary btn-flat']) !!}
                    <a href="{!! route('admin.post.tags.index') !!}" class="btn btn-default btn-flat">{{ trans('l5starter::button.cancel') }}</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection