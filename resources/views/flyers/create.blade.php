@extends('layout')

@section('content')
    <h1>Selling Your Home?</h1>

    <hr>

    <form method="post" action="/flyers" enctype="multipart/form-data">
        <!-- Street Form Input -->
        <div class="form-group">
            <label for="street">Street:</label>
            <input type="text" name="street" id="street" class="form-control" value="{{ old('street') }}">
        </div>

        <!-- City Form Input -->
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}">
        </div>

        <!-- Zip Form Input -->
        <div class="form-group">
            <label for="zip">Zip/Postal Code:</label>
            <input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip') }}">
        </div>

        <!-- Country Form Input -->
        <div class="form-group">
            <label for="country">Country:</label>
            <select id="country" name="country" class="form-control">
            </select>
        </div>

        <!-- State Form Input -->
        <div class="form-group">
            <label for="state">State:</label>
            <select id="state" name="state" class="form-control">
            </select>
        </div>

        <hr>

        <!-- Price Form Input -->
        <div class="form-group">
            <label for="price">Sale Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
        </div>

        <!-- Description Form Input -->
        <div class="form-group">
            <label for="description">Home Description:</label>
            <textarea type="text" name="description" id="description" class="form-control" rows="10">
                {{ old('description') }}
            </textarea>
        </div>

        <!-- Photos Form Input -->
        <div class="form-group">
            <label for="photos">Photos:</label>
            <input type="file" name="photos" id="photos" class="form-control" value="{{ old('photos') }}">
        </div>

        <!-- Form Submit -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Flyer</button>
        </div>
    </form>
@stop