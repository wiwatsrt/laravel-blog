@extends('l5starter::admin.layouts.master')

@section('content-header')
    <h1>
        Tags
    </h1>
@stop

@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Add New Tag</h1>
                </div>
                <div class="box-body">
                    @include('l5starter::common.errors')
                    {!! Form::open(['route' => 'admin.post.tags.store']) !!}
                    <div class="row">
                        @include('admin.post.tags.fields')
                        <div class="form-group col-sm-12">
                            {!! Form::submit(trans('messages.add_new_tag'), ['class' => 'btn btn-primary btn-flat']) !!}
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
                        @foreach($postTags as $postTag)
                            <tr>
                                <td>{!! $postTag->name !!}</td>
                                <td>{!! $postTag->slug !!}</td>
                                <td>
                                    {!! Form::open(['route' => ['admin.post.tags.destroy', $postTag->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{!! route('admin.post.tags.edit', [$postTag->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('" . trans('l5starter::messages.delete.warning') . "')"]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $postTags->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
