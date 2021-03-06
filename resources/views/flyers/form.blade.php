@inject('countries', 'App\Http\Utilities\Country')

<div class="row">

    <div class="col-md-6">
        {{ csrf_field() }}

        <!-- Street Form Input -->
        <div class="form-group">
            <label for="street">Street:</label>
            <input type="text" name="street" id="street" class="form-control" value="{{ old('street') }}" required>
        </div>

        <!-- City Form Input -->
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
        </div>

        <!-- Zip Form Input -->
        <div class="form-group">
            <label for="zip">Zip/Postal Code:</label>
            <input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip') }}" required>
        </div>

        <!-- Country Form Input -->
        <div class="form-group">
            <label for="country">Country:</label>
            <select id="country" name="country" class="form-control">
                @foreach($countries::all() as $country => $code)
                    <option value="{{ $code }}">{{ $country }}</option>
                @endforeach
            </select>
        </div>

        <!-- State Form Input -->
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Price Form Input -->
        <div class="form-group">
            <label for="price">Sale Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
        </div>

        <!-- Description Form Input -->
        <div class="form-group">
            <label for="description">Home Description:</label>
                    <textarea type="text" name="description" id="description" class="form-control" rows="10" required></textarea>
        </div>

    </div>


    <div class="col-md-12">
        <hr>

        <!-- Form Submit -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Flyer</button>
        </div>
    </div>

</div>
