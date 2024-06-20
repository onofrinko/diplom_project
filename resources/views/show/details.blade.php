<!-- resources/views/show/details.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <h1>Property Details</h1>
        <div class="view-details">
            <p><strong>ID:</strong> {{ $properties->property_id }}</p>
            <p><strong>Landlord ID:</strong> {{ $properties->lendlord_id }}</p>
            <p><strong>Cost:</strong> {{ $properties->cost }}</p>
            <p><strong>Total Area:</strong> {{ $properties->total_area }} m²</p>
            <p><strong>Publication Date:</strong> {{ $properties->pub_date->format('Y-m-d') }}</p>
            <p><strong>Property Status:</strong> {{ $properties->property_status }}</p>
            <p><strong>Property Type ID:</strong> {{ $properties->property_type_id }}</p>
            <p><strong>Property Details:</strong> {{ json_encode($properties->property_details) }}</p>
            <div class="property-image">
                <img src="{{ $properties->image ? asset($properties->image) : url('/images/house.webp') }}" alt="Property Image" style="width: 400px; height: 300px; object-fit: cover; border-radius: 8px;"/>
            </div>
            @if($user)
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">
                    If you like this property and want to contact the landlord, you should add it to your wishlist.
                    <br>
                    <div class="button-container">
                        <form action="{{ route('property.wish', $properties->property_id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="rounded-md px-4 py-2 text-white bg-blue-500 hover:bg-blue-700 transition duration-300 ease-in-out mt-auto">
                                Add to Wishlist
                            </button>
                        </form>
                    </div>
                </span>
            </div>

            @else
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">
                    If you like this property and want to contact the landlord, you should add it to your wishlist.
                    Wishlist is available only for registered users. Please
                    <a href="{{ route('login') }}" class="font-bold text-blue-800 underline">Login</a>
                    or
                    <a href="{{ route('register') }}" class="font-bold text-blue-800 underline">Register</a>.
                </span>
            </div>
            @endif
        </div>
    </div>
</body>
</html>
