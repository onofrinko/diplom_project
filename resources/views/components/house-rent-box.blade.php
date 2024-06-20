@props(['propertyId', 'image', 'title', 'description', 'price', 'bedrooms', 'bathrooms', 'floors', 'total_area', 'address'])

<article class="house-rent-box">
    <div class="house-rent-box__image">
        <img src="{{ $image ? url($image) : url('/images/house.webp') }}" alt="House Image"/>
    </div>
    <div class="house-rent-box__content">
        <footer>
            <p><strong>Price:</strong> ${{ $price }}</p>
            <p>{{ $bedrooms }} bedrooms 🛏️, {{ $bathrooms }} bathrooms 🚿, {{ $floors }} - floors 🏠, {{ $total_area }} m²</p>
            <p class="address-text">{{ $address['building'] }}, {{ $address['street'] }}, {{ $address['city'] }}, {{ $address['zip'] }}</p>
        </footer>
        <div class="button-container" style="align-self: flex-end;">
            <a href="{{ route('show.details', $propertyId) }}"
               class="rounded-md px-3 py-2 text-black bg-blue-500 hover:bg-blue-700 text-white transition duration-300 ease-in-out inline-block mt-auto">
                View details
            </a>
        </div>
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

    .detail-button {
        background-color: #007bff;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        display: inline-block; 
        margin-top: auto; 
    }

    .detail-button:hover {
        background-color: #0056b3;
    }

</style>
