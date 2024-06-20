<!-- resources/views/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl mb-4">My Properties</h3>
                    @if($properties->isEmpty())
                        <p>No properties found.</p>
                    @else
                        @foreach ($properties as $property)
                            <x-house-rent-box
                                :image="$property->image"
                                :price="$property->cost"
                                 :bedrooms="$property->property_details['bedrooms']"
                                 :bathrooms="$property->property_details['bathrooms']"
                                 :floors="$property->property_details['floors']"
                                 :total_area="$property->total_area"
                                 :propertyType="$property->propertyType->type"
                                 :address="$property->property_details['address']"
                                 :property_id="$property->property_id"
                            />
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
