@props(['image', 'title', 'description', 'price', 'bedrooms', 'bathrooms', 'total_area'])

<article class="house-rent-box">
    <div class="house-rent-box__image">
        <img src="{{ $image ?: url('/images/house.webp') }}" alt="House Image"/>
    </div>
    <div class="house-rent-box__content">
        <header>
            <h2>{{ $title }}</h2>
        </header>
        <p>{{ $description }}</p>
        <footer>
            <p><strong>Price:</strong> ${{ $price }}</p>
            <p>{{ $bedrooms }} bedrooms 🛏️, {{ $bathrooms }} bathrooms 🚿, {{ $total_area }} m²</p>
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
</style>