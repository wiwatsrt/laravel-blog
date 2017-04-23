@extends('l5starter::admin.layouts.master')

@section('content-header')
    <h1>
        Posts
    </h1>
@stop

@section('content')
    @include('flash::message')
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ trans('messages.name') }}</th>
                        <th>{{ trans('messages.author') }}</th>
                        <th>{{ trans('messages.category') }}</th>
                        <th>{{ trans('messages.status') }}</th>
                        <th>{{ trans('messages.date') }}</th>
                        <th colspan="3">{{ trans('l5starter::general.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{!! $post->title !!}</td>
                        <td>{!! $post->author->name !!}</td>
                        <td>{!! $post->category->name !!}</td>
                        <td>{!! $post->status->name !!}</td>
                        <td>{!! $post->publish_date_at !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.posts.destroy', $post->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('admin.posts.edit', [$post->id]) !!}"
                                   class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('" . trans('l5starter::messages.delete.warning') . "')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
@endsection
