@props(['image', 'title', 'description', 'price', 'bedrooms', 'bathrooms', 'floors', 'total_area', 'address', 'property_id' ])

<article class="house-rent-box">
    <div class="house-rent-box__image">
        <img src="{{ $image ? url($image) : url('/images/house.webp') }}" alt="House Image"/>
    </div>
    <div class="house-rent-box__content">
        <div>
            <p><strong>Price:</strong> ${{ $price }}</p>
            <p>{{ $bedrooms }} bedrooms 🛏️</p>
            <p>{{ $bathrooms }} bathrooms 🚿</p>
            <p>{{ $floors }} - floors 🏠</p>
            <p>{{ $total_area }} m²</p>
            <p style="font-size: 0.3rem">&nbsp;</p>
            <p class="address-text">{{ $address['building'] }}, {{ $address['street'] }}, {{ $address['city'] }}, {{ $address['zip'] }}</p>
        </div>
        <footer>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div class="button-container">
                <a href="{{ route('show.details', $property_id) }}"
                   class="rounded-md px-1 py-1 text-black bg-blue-500 hover:bg-blue-700 text-white transition duration-300 ease-in-out inline-block mt-auto button-text">
                    View details
                </a>
            </div>
            <div class="button-container">
                <a href="{{ route('property.edit', ['property' => $property_id]) }}"
                   class="rounded-md px-1 py-1 text-black bg-green-700 hover:bg-green-900 text-white transition duration-300 ease-in-out inline-block mt-auto button-text">
                    Edit details
                </a>
            </div>
        </footer>
    </div>
</article>

<style>
    .house-rent-box {
        display: flex;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 1rem;
        margin: 1rem 0;
        align-items: flex-start;
    }

    .house-rent-box__image img {
        width: 400px;
        height: 300px;
        object-fit: cover;
        border-radius: 8px;
    }

    .house-rent-box__content {
        margin-left: 1rem;
        flex: 1;
    }

    .address-text {
        font-size: 0.8rem;
        font-style: italic;
    }

    .button-text {
        font-size: 0.8rem;
    }
</style>
