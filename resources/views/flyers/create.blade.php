@extends('layout')

@section('content')
    <h1>Selling Your Home?</h1>

    <hr>

    <div class="row">
        <form method="post" action="/flyers" enctype="multipart/form-data" class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @include('flyers.form')
        </form>
    </div>
@stop