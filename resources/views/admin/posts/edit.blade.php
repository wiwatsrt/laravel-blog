@extends('l5starter::admin.layouts.master')

@section('content-header')
    <h1>
        Posts
    </h1>
@stop

@section('content')

    @include('l5starter::common.errors')
    {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'patch']) !!}
    <div class="row">
        <div class="col-md-9">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Edit Post</h1>
                </div>
                <div class="box-body">
                    <div class="row">
                        @include('admin.posts.fields')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        @include('admin.posts.options')
                        <div class="form-group col-sm-12 text-right">
                            <a href="{!! route('admin.posts.index') !!}" class="btn btn-default btn-flat">{{ trans('l5starter::button.cancel') }}</a>
                            {!! Form::submit(trans('l5starter::button.update'), ['class' => 'btn btn-primary btn-flat']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

@endsection