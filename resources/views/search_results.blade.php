@extends('layouts.app')

@section('title', 'Real Estate Search')

@section('content')
    <h1>Real Estate Search</h1>
    <form action="{{ route('real_estate.search') }}" method="GET" class="container" style="max-width: 640px;">
    @csrf
    <div class="stack">
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" class="input" placeholder="Enter location">
    </div>

    <div class="grid">
        <div class="stack">
            <label for="min_price">Min Price:</label>
            <input type="number" name="min_price" id="min_price" class="input" placeholder="Minimum Price">
        </div>

        <div class="stack">
            <label for="max_price">Max Price:</label>
            <input type="number" name="max_price" id="max_price" class="input" placeholder="Maximum Price">
        </div>
    </div>

    <div class="stack">
        <label for="property_type">Property Type:</label>
        <select name="property_type" id="property_type" class="input">
            <option value="house">House</option>
            <option value="apartment">Apartment</option>
            <option value="condo">Condo</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <button type="submit" class="button primary">Search</button>
    </form>
@endsection
