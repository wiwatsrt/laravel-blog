@extends('l5starter::admin.layouts.master')

@section('content-header')
    <h1>
        Categories
    </h1>
@stop

@section('content')
    @include('flash::message')
    <div class="rows">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Add New Category</h1>
                </div>
                <div class="box-body">
                    @include('l5starter::common.errors')
                    {!! Form::open(['route' => 'admin.post.categories.store']) !!}
                    <div class="row">
                        @include('admin.post.categories.fields')
                        <div class="form-group col-sm-12">
                            {!! Form::submit(trans('messages.add_new_category'), ['class' => 'btn btn-primary btn-flat']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ trans('messages.name') }}</th>
                                <th>{{ trans('messages.slug') }}</th>
                                <th colspan="3">{{ trans('l5starter::general.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{!! $category->name !!}</td>
                                <td>{!! $category->slug !!}</td>
                                <td>
                                    {!! Form::open(['route' => ['admin.post.categories.destroy', $category->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{!! route('admin.post.categories.edit', [$category->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('" . trans('l5starter::messages.delete.warning') . "')"]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
