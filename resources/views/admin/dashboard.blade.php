<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="motor">Customize</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="community">Community</a>
                </li>
            </ul>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="dropdown-item">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
        /* Container Styling */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Dashboard Header */
        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        /* Grid Layout for the 3 Sections */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        /* Card Styling */
        .bg-white {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 20px;
            transition: transform 0.2s ease; /* Keep transition for smooth scaling */
        }

        /* Hover effect only for cards */
        .bg-white.card:hover {
            transform: scale(1.05);
        }

        .text-xl {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #111;
        }

        .text-gray-600 {
            color: #555;
            font-size: 16px;
        }

        /* Responsive Behavior */
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ route('admin.user') }}">
                <div class="bg-white card shadow-lg rounded-lg p-5 transition-transform transform">
                    <h2 class="text-xl font-semibold">Users</h2>
                    <p class="text-gray-600">Total users: {{ $userCount }}</p>
                </div>
            </a>

            <a href="{{ route('admin.motor') }}">
                <div class="bg-white card shadow-lg rounded-lg p-5 transition-transform transform">
                    <h2 class="text-xl font-semibold">Customize Motorcycle</h2>
                    <p class="text-gray-600">Total posts: {{ $motorCount }}</p>
                </div>
            </a>

            <a href="{{ route('admin.community') }}">
                <div class="bg-white card shadow-lg rounded-lg p-5 transition-transform transform">
                    <h2 class="text-xl font-semibold">Community Hub</h2>
                    <p class="text-gray-600">Total posts: {{ $communityCount }}</p>
                </div>
            </a>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
