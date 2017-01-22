@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title }}</div>

                    <div class="panel-body">
                        <form class = "form-horizontal" role="form" method="post"  action="{{ route('storePost') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="titulo" class="col-sm-2 control-label">Titulo</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="titulo" placeholder="Titulo del post">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contenido" class="col-sm-2 control-label">Contenido</label>
                                <div class="col-sm-10">
                                    <input type="text" name="content" value="{{ old('content') }}"  class="form-control" id="contenido" placeholder="Contenido del post">
                                </div>
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">Aceptar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
