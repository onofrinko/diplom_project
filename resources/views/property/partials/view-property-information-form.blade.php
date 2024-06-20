<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Property details') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("View property details.") }}
        </p>
    </header>

    <div class="container">
        <div class="flex items-center gap-12">

            @if (session('status') === 'property-wished')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-green-600 dark:text-green-400"
            >{{ __('Property added to wishlist.') }}</p>
            @endif
            @if (session('status') === 'property-already-wished')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-green-600 dark:text-green-400"
            >{{ __('Property already added to wishlist.') }}</p>
            @endif
        </div>

        @if ($property->image)
        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
            <h2 class="text-2xl font-bold mb-4">Property Image</h2>
            <img src="{{ url(Storage::url($property->image)) }}" alt="House Image" class="w-full h-auto rounded-lg">
        </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
            <h2 class="text-2xl font-bold mb-4">Basic Information</h2>

            <p><strong>Property Cost:</strong> ${{ number_format($property->cost, 2) }}</p>
            <p><strong>Total Area:</strong> {{ number_format($property->total_area) }} sq ft</p>
            <p><strong>Property Status:</strong> {{ ucfirst($property->status) }}</p>
            <p><strong>Property Type:</strong> {{ $property->propertyType->type }}</p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
            <h2 class="text-2xl font-bold mb-4">Address</h2>

            <p><strong>City:</strong> {{ $property->property_details['address']['city'] }}</p>
            <p><strong>Building:</strong> {{ $property->property_details['address']['building'] }}</p>
            <p><strong>Street:</strong> {{ $property->property_details['address']['street'] }}</p>
            <p><strong>Zip Code:</strong> {{ $property->property_details['address']['zip'] }}</p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
            <h2 class="text-2xl font-bold mb-4">Additional Details</h2>

            <p><strong>Bedrooms:</strong> {{ $property->property_details['bedrooms'] }}</p>
            <p><strong>Bathrooms:</strong> {{ $property->property_details['bathrooms'] }}</p>
            <p><strong>Floors:</strong> {{ $property->property_details['floors'] }}</p>
            <p><strong>Garage:</strong> {{ $property->property_details['garage'] ? 'Yes' : 'No' }}</p>
            <p><strong>Pool:</strong> {{ $property->property_details['pool'] ? 'Yes' : 'No' }}</p>
            <p><strong>Description:</strong> {{ $property->property_details['description'] }}</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
            <h2 class="text-2xl font-bold mb-4">Landlord Contact details</h2>

            <p><strong>Name:</strong> {{ $property->lendlord->first_name . ' ' . $property->lendlord->last_name}}</p>
            <p><strong>Email:</strong> {{ $property->lendlord->user->email }}</p>
            <p><strong>Phone:</strong> {{ $property->lendlord->phone_number }}</p>
        </div>
    </div>
</section>
