<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>aquacare</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

           <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
    <div class="relative w-full max-w-8xl px-6">



                  <main class="mt-6">

s
    <section class="text-center py-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-3xl shadow-lg text-white">
        <h1 class="text-4xl font-extrabold tracking-wide">Welcome to <span class="text-yellow-300">Aquacare</span></h1>
        <p class="mt-4 text-lg opacity-90 max-w-2xl mx-auto">
            Your trusted partner in clean, purified drinking water—delivered right to your home.
        </p>

        <div class="mt-6 flex justify-center gap-4">
            <a href="/register" class="px-6 py-3 bg-white text-blue-700 font-bold rounded-lg shadow hover:bg-gray-100">
                Get Started
            </a>

        </div>
    </section>


    <section id="about" class="mt-16 bg-white p-10 rounded-2xl shadow-md">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">About Aquacare</h2>
        <p class="text-gray-700 leading-relaxed">
            Aquacare is dedicated to providing safe, clean, and affordable purified water to homes and businesses.
            Our mission is to make clean water accessible to everyone through modern filtration systems and efficient services.
        </p>
    </section>


    <section class="mt-16">
        <h2 class="text-2xl font-bold text-blue-700 mb-6 text-center">Why Choose Aquacare?</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <i class="ri-shield-check-fill text-blue-600 text-4xl mb-3"></i>
                <h3 class="font-bold text-lg text-gray-800">Trusted Quality</h3>
                <p class="text-gray-600 text-sm mt-2">
                    Our water undergoes strict purification using high-grade filtration technology.
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <i class="ri-truck-fill text-blue-600 text-4xl mb-3"></i>
                <h3 class="font-bold text-lg text-gray-800">Fast Delivery</h3>
                <p class="text-gray-600 text-sm mt-2">
                    We deliver fresh purified water right to your doorstep—fast and convenient.
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <i class="ri-money-dollar-circle-fill text-blue-600 text-4xl mb-3"></i>
                <h3 class="font-bold text-lg text-gray-800">Affordable Pricing</h3>
                <p class="text-gray-600 text-sm mt-2">
                    Enjoy high-quality water without the high price. Perfect for families and businesses.
                </p>
            </div>

        </div>
    </section>


    <section id="contact" class="mt-16 bg-white p-10 rounded-2xl shadow-md">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Contact Us</h2>

        <p class="text-gray-700">
            Got questions? We’re here to help! Contact Aquacare through the details below.
        </p>

        <div class="mt-6 space-y-3">
            <p><i class="ri-phone-fill text-blue-600"></i> <strong>Phone:</strong> 0912-345-6789</p>
            <p><i class="ri-mail-fill text-blue-600"></i> <strong>Email:</strong> aquacare@gmail.com</p>

        </div>


    </section>

</main>



                </div>
            </div>
        </div>
    </body>
</html>
