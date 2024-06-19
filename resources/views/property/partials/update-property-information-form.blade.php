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
