@extends('layout')

@section('content')
    <h1>Selling Your Home?</h1>

    <hr>

    <form method="post" action="/flyers" enctype="multipart/form-data">
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
@stop