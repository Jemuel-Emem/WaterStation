<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquacare - User</title>

    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @wireUiScripts

    <style>
        body {
            background-color: #F0FAFF;
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(90deg, #00A1E3, #00C4FF);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 2rem;
            color: white;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 50;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar .brand img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .navbar ul {
            display: flex;
            gap: 1.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navbar ul li a {
            color: #EAFBFF;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            transition: color 0.2s;
        }

        .navbar ul li a:hover {
            color: #FFD700;
        }

        .logout-button {
            background-color: #007BBF;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-weight: 500;
            transition: background 0.2s;
        }

        .logout-button:hover {
            background-color: #00A6FF;
        }


        .main-content {
            padding: 6rem 2rem 2rem 2rem;
        }

        @media (max-width: 640px) {
            .navbar ul {
                display: none;
            }
        }
    </style>
</head>
<body>

@livewireScripts


<nav class="navbar">
    <div class="brand">
        <img src="{{asset('images/ChatGPT Image Nov 17, 2025, 09_30_13 AM.png')}}" alt="User">
        <span>AQUACARE</span>
    </div>

    <ul>
        <li><a href="{{route('userdashboard')}}"><i class="ri-home-4-fill"></i> Home</a></li>
        <li><a href="{{route('user.products')}}"><i class="ri-shopping-bag-fill"></i> Products</a></li>
        <li><a href="{{route('user.order')}}"><i class="ri-shopping-cart-fill"></i> Orders</a></li>
        <li><a href="{{route('user.message')}}"><i class="ri-chat-1-fill"></i> Messages</a></li>
    </ul>

    <form method="POST" action="{{ route('logouts') }}">
        @csrf
        <button type="submit" class="logout-button">
            <i class="ri-logout-box-r-line"></i> Logout
        </button>
    </form>
</nav>

<!-- Main Content -->
<div class="main-content">
    <main>
        {{ $slot }}
    </main>
</div>

</body>
</html>
