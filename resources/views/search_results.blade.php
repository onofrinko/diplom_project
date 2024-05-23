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
            <input type="number" name="min_price" id="min_price" class="input" placeholder="Minimum Price" value="{{$request->input('min_price','')}}">
        </div>

        <div class="stack">
            <label for="max_price">Max Price:</label>
            <input type="number" name="max_price" id="max_price" class="input" placeholder="Maximum Price" value="{{$request->input('max_price','')}}">
        </div>
    </div>

    <div class="stack">
        <label for="property_type">Property Type:</label>
        <select name="property_type" id="property_type" class="input">
            @foreach($property_types as $pt)
                <option value="{{$pt->property_type_id}}" {{$pt->property_type_id == $request->input('property_type') ? 'selected' : ''}}>{{$pt->type}}</option>
            @endforeach
        </select>
    </div>

    <div class="grid">
        <div class="stack">
            <label for="min_area">Min Area:</label>
            <input type="number" name="min_area" id="min_area" class="input" placeholder="Minimum Area" value="{{$request->input('min_area','')}}">
        </div>

        <div class="stack">
            <label for="max_area">Max Area:</label>
            <input type="number" name="max_area" id="max_area" class="input" placeholder="Maximum Area" value="{{$request->input('max_area','')}}">
        </div>
    </div>

    <div class="grid">
        <div class="stack">
            <label for="bedrooms">Number of bedrooms:</label>
            <input type="number" name="num_bed" id="min_area" class="input" placeholder="Number" value="{{$request->input('num_bed','')}}">
        </div>

        <div class="stack">
            <label for="bathrooms">Number of bathrooms:</label>
            <input type="number" name="num_bath" id="num_bath" class="input" placeholder="Number" value="{{$request->input('num_bath','')}}">
        </div>
    </div>

    <div class="stack">
        <label for="floors">Number of floors:</label>
        <input type="number" name="num_floors" id="num_floors" class="input" placeholder="Number" value="{{$request->input('num_floors','')}}">
    </div>

    <button type="submit" class="button primary">Search</button>
    </form>
    
    <style>
        .found-options {
            font-size: x-large;
            font-weight: bold;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            margin: 1rem 0;
            align-items: flex-start;
        }
    </style>
    
    <p class="found-options">{{count($properties)}} - Items found based on your query. Check them out below:</p>
    


    <ul>
    @foreach ($properties as $p)
        <li>{{$p->propertyType->type}} - {{$p->cost}}</li>
    @endforeach
    </ul>

    @foreach ($properties as $p)
    <x-house-rent-box
        :image="$p->image_url"
        :title="$p->title"
        :description="$p->description"
        :price="$p->cost"
        :bedrooms="$p->property_details['bedrooms']"
        :bathrooms="$p->property_details['bathrooms']"
        :floors="$p->property_details['floors']"
        :total_area="$p->total_area"
        :address="$p->property_details['address']"
    />
    @endforeach
@endsection
