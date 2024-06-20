<!-- resources/views/show/details.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Подключение CSS файла, если необходимо -->
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
        </div>
    </div>
</body>
</html>
