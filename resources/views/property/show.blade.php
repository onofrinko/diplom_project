<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Property') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if ($user->lendlord && $user->lendlord->lendlord_id == $property->lendlord_id)
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    @include('property.partials.view-property-information-form')
                </div>
            </div>
            @else
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('You are not authorized to edit this property.') }}
                    </h3>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
