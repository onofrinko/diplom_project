<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Property Image') }}
        </h2>


    </header>


    <form action="{{ route('property.updateImage', $property->property_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        @if ($property->image)
        @php

        <img src="{{ $property->image ? url(Storage::url($property->image)) : url('/images/house.webp') }}" alt="House Image" class="w-full h-auto rounded-lg mb-4">

        <p>&nbsp;</p>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update image.") }}
        </p>
        @else
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Choose an image to upload.") }}
        </p>
        @endif

        <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        <x-input-error class="mt-2" :messages="$errors->get('image')" />

        <p>&nbsp;</p>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'image-updated')
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
