@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @include('partials/errors')
                    @include('partials/success')
                    <div class="panel-heading">{{ $title }}
                        <div class="pull-right"><a href="{{ route('createPost') }}">Nuevo post</a></div>
                    </div>
                    <div class="panel-body">
                        <ul>
                        @foreach($posts as $post)
                            <li>{{ $post->title }} </li>
                               {{ $post->content }}
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
