@extends('l5starter::admin.layouts.master')

@section('content-header')
    <h1>
        Post Status
    </h1>
@stop

@section('content')

    @include('l5starter::common.errors')

    <div class="box">
        <div class="box-header with-border">
            <h1 class="box-title">Edit Post Status</h1>
        </div>
        <div class="box-body">
            {!! Form::model($postStatus, ['route' => ['admin.post.statuses.update', $postStatus->id], 'method' => 'patch']) !!}
            <div class="row">
                @include('admin.post.statuses.fields')
                <div class="form-group col-sm-12">
                    {!! Form::submit(trans('l5starter::button.update'), ['class' => 'btn btn-primary btn-flat']) !!}
                    <a href="{!! route('admin.post.statuses.index') !!}" class="btn btn-default btn-flat">{{ trans('l5starter::button.cancel') }}</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection