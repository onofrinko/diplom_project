<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Property details') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update property details.") }}
        </p>
    </header>


    <form method="post" action="{{ route('property.update',$property->property_id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')


        <div>
            <x-input-label for="property_cost" :value="__('Property Cost')" />
            <x-text-input id="property_cost" name="property_cost" type="number" class="mt-1 block w-full" :value="old('property_cost', $property->cost)" required autocomplete="property_cost" />
            <x-input-error class="mt-2" :messages="$errors->get('property_cost')" />
        </div>

        <div>
            <x-input-label for="total_area" :value="__('Total Area (sq ft)')" />
            <x-text-input id="total_area" name="total_area" type="number" class="mt-1 block w-full" :value="old('total_area', $property->total_area)" required autocomplete="total_area" />
            <x-input-error class="mt-2" :messages="$errors->get('total_area')" />
        </div>

        <div>
            <x-input-label for="property_status" :value="__('Property Status')" />
            <select id="property_status" name="property_status" class="mt-1 block w-full">
                <option value="available" {{ old('property_status', $property->status) == 'available' ? 'selected' : '' }}>Available</option>
                <option value="sold" {{ old('property_status', $property->status) == 'sold' ? 'selected' : '' }}>Sold</option>
                <option value="pending" {{ old('property_status', $property->status) == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('property_status')" />
        </div>

        <div>
            <x-input-label for="property_type_id" :value="__('Property Type')" />
            <select id="property_type_id" name="property_type_id" class="mt-1 block w-full">
                @foreach ($propertyTypes as $type)
                <option value="{{ $type->property_type_id }}" {{ old('property_type_id', $property->property_type_id) == $type->id ? 'selected' : '' }}>
                {{ $type->type }}
                </option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('property_type_id')" />
        </div>

        <!-- Property Details -->
        <div class="mt-4">
            <x-input-label for="address_city" :value="__('City')" />
            <x-text-input id="address_city" name="property_details[address][city]" type="text" class="mt-1 block w-full" :value="old('property_details.address.city', $property->property_details['address']['city'])" required />
            <x-input-error class="mt-2" :messages="$errors->get('property_details.address.city')" />
        </div>

        <div>
            <x-input-label for="address_building" :value="__('Building')" />
            <x-text-input id="address_building" name="property_details[address][building]" type="text" class="mt-1 block w-full" :value="old('property_details.address.building', $property->property_details['address']['building'])" required />
            <x-input-error class="mt-2" :messages="$errors->get('property_details.address.building')" />
        </div>

        <div>
            <x-input-label for="address_street" :value="__('Street')" />
            <x-text-input id="address_street" name="property_details[address][street]" type="text" class="mt-1 block w-full" :value="old('property_details.address.street', $property->property_details['address']['street'])" required />
            <x-input-error class="mt-2" :messages="$errors->get('property_details.address.street')" />
        </div>

        <div>
            <x-input-label for="address_zip" :value="__('Zip Code')" />
            <x-text-input id="address_zip" name="property_details[address][zip]" type="text" class="mt-1 block w-full" :value="old('property_details.address.zip', $property->property_details['address']['zip'])" required />
            <x-input-error class="mt-2" :messages="$errors->get('property_details.address.zip')" />
        </div>

        <div>
            <x-input-label for="bedrooms" :value="__('Bedrooms')" />
            <x-text-input id="bedrooms" name="property_details[bedrooms]" type="number" class="mt-1 block w-full" :value="old('property_details.bedrooms', $property->property_details['bedrooms'])" required />
            <x-input-error class="mt-2" :messages="$errors->get('property_details.bedrooms')" />
        </div>

        <div>
            <x-input-label for="bathrooms" :value="__('Bathrooms')" />
            <x-text-input id="bathrooms" name="property_details[bathrooms]" type="number" class="mt-1 block w-full" :value="old('property_details.bathrooms', $property->property_details['bathrooms'])" required />
            <x-input-error class="mt-2" :messages="$errors->get('property_details.bathrooms')" />
        </div>

        <div>
            <x-input-label for="floors" :value="__('Floors')" />
            <x-text-input id="floors" name="property_details[floors]" type="number" class="mt-1 block w-full" :value="old('property_details.floors', $property->property_details['floors'])" required />
            <x-input-error class="mt-2" :messages="$errors->get('property_details.floors')" />
        </div>

        <div>
            <x-input-label for="garage" :value="__('Garage')" />
            <select id="garage" name="property_details[garage]" class="mt-1 block w-full">
                <option value="1" {{ old('property_details.garage', $property->property_details['garage']) == true ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('property_details.garage', $property->property_details['garage']) == false ? 'selected' : '' }}>No</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('property_details.garage')" />
        </div>

        <div>
            <x-input-label for="pool" :value="__('Pool')" />
            <select id="pool" name="property_details[pool]" class="mt-1 block w-full">
                <option value="1" {{ old('property_details.pool', $property->property_details['pool']) == true ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('property_details.pool', $property->property_details['pool']) == false ? 'selected' : '' }}>No</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('property_details.pool')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="property_details[description]" class="mt-1 block w-full" required>{{ old('property_details.description', $property->property_details['description']) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('property_details.description')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'property-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-green-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
