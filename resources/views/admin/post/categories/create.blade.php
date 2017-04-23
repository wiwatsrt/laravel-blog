@extends('l5starter::admin.layouts.master')

@section('content-header')
    <h1>
        Categories
    </h1>
@stop

@section('content')

    @include('l5starter::common.errors')

    <div class="box">
        <div class="box-header with-border">
            <h1 class="box-title">Add New Category</h1>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => 'admin.post.categories.store']) !!}
            <div class="row">
                @include('admin.post.categories.fields')
                <div class="form-group col-sm-12">
                    <a href="{!! route('admin.post.categories.index') !!}" class="btn btn-default btn-flat">{{ trans('l5starter::button.back') }}</a>
                    {!! Form::submit(trans('messages.add_new_category'), ['class' => 'btn btn-primary btn-flat']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection