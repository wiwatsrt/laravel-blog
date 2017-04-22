@extends('l5starter::admin.layouts.master')

@section('content-header')
    <h1>
        Post Status
    </h1>
@stop

@section('content')
    @include('flash::message')
    <div class="rows">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Add New Post Status</h1>
                </div>
                <div class="box-body">
                    @include('l5starter::common.errors')
                    {!! Form::open(['route' => 'admin.post.statuses.store']) !!}
                    <div class="row">
                        @include('admin.post.statuses.fields')
                        <div class="form-group col-sm-12">
                            {!! Form::submit(trans('messages.add_new_status'), ['class' => 'btn btn-primary btn-flat']) !!}
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
                        <th>Name</th>
                        <th colspan="3">{{ trans('l5starter::general.action') }}</th>
                        </thead>
                        <tbody>
                        @foreach($postStatuses as $postStatus)
                            <tr>
                                <td>{!! $postStatus->name !!}</td>
                                <td>
                                    {!! Form::open(['route' => ['admin.post.statuses.destroy', $postStatus->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{!! route('admin.post.statuses.edit', [$postStatus->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('" . trans('l5starter::messages.delete.warning') . "')"]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $postStatuses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
