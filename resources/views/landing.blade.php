{{-- Updated Landing Page Template: resources/views/landing.blade.php --}}

@extends('layouts.app')

@section('title', 'Discover Your Dream Home')

@section('content')
<div class="container text-center hero-image">
    <h1 class="hero-heading">Your Journey Home Begins Here</h1>
    <p class="lead">Explore a world where dreams meet reality. From cozy apartments to luxurious houses, find a place you can truly call home. Let's navigate the path to your dream home together.</p>
    <a href="{{ route('real_estate.search') }}" class="find-your-home-button">Find Your Home</a>

    <div class="features">
        <div class="grid">
            <div>
                <h3>Wide Range of Properties</h3>
                <p>Choose from thousands of listings, each with detailed information to help you make the right decision.</p>
            </div>
            <div>
                <h3>Trusted by Thousands</h3>
                <p>Join a community of happy homeowners who found their dream homes with us.</p>
            </div>
            <div>
                <h3>Expert Guidance</h3>
                <p>Get advice and insights from real estate experts to guide you at every step of your journey.</p>
            </div>
        </div>
    </div>
</div>
@endsection

