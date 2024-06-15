<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Default Title')</title>
    <!-- Include global stylesheets, scripts, etc. -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    />
    <style>
        .hero-heading {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .lead {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .features {
            margin-top: 3rem;
        }

        .features h3 {
            font-size: 1.5rem;
            color: #333;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2rem;
        }

        .button.large {
            padding: 0.75rem 2rem;
            font-size: 1.2rem;
        }

        .hero-image {
            position: relative;
            color: #fff;
            text-align: center;
            padding: 4rem 0.2rem;
            z-index: 1; /* Ensure text content is above the background */
        }

        .hero-image::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('/images/background.webp');
            background-size: cover;
            opacity: 0.7; /* Adjust this value for desired transparency level */
            z-index: -1; /* Place the background behind the container's content */
        }

        .find-your-home-button {
            display: inline-block;
            background-color: #007BFF; /* Primary button color */
            color: #ffffff; /* Text color */
            padding: 10px 20px; /* Top and bottom padding, Left and right padding */
            text-decoration: none; /* Remove underline from links */
            font-size: 1rem; /* Button text size */
            border-radius: 5px; /* Rounded corners */
            border: none; /* No border */
            transition: background-color 0.3s, transform 0.2s; /* Smooth background color and transform transition */
        }

        .find-your-home-button:hover, .find-your-home-button:focus {
            background-color: #0056b3; /* Darker shade on hover/focus for contrast */
            color: #ffffff; /* Ensure text color remains the same */
            transform: translateY(-2px); /* Slight upward shift to give a 'lift' effect */
            text-decoration: none; /* Ensure underline does not reappear on hover */
        }
    </style>
</head>
<body>
<header>
    <!-- Header content -->
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Footer content -->
</footer>
</body>
</html>

