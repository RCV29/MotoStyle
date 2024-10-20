<x-app-layout>
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

        /* Grid Layout for the Sections */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        /* Card Styling */
        .card {
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        /* Card Hover Effect */
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        /* Motorcycle Icon Styling */
        .motor-card::before {
            content: '';
            background: url('https://cdn-icons-png.flaticon.com/512/1686/1686118.png') no-repeat center right;
            background-size: 100px;
            opacity: 0.2;
            position: absolute;
            top: 0;
            right: 20px;
            height: 100%;
            width: 100px;
        }

        /* Community Card Styling */
        .community-card::before {
            content: '';
            background: url('https://cdn-icons-png.flaticon.com/512/456/456283.png') no-repeat center right;
            background-size: 80px;
            opacity: 0.2;
            position: absolute;
            top: 0;
            right: 20px;
            height: 100%;
            width: 100px;
        }

        /* Text Styling */
        .card h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #111;
        }

        .text-gray-600 {
            color: #555;
            font-size: 16px;
        }

        /* Feature Highlight Section */
        .spotlight {
            margin-top: 40px;
        }

        .spotlight-card {
            background: url('http://127.0.0.1:8000/uploads/motors/1728693029.jpg') no-repeat center center;
            background-size: cover;
            height: 250px;
            position: relative;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .spotlight-content {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: white;
        }

        .spotlight-content h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .spotlight-content p {
            font-size: 18px;
        }

        .spotlight-content a {
            font-size: 16px;
            color: #ffd700; /* Gold color for the link */
            font-weight: bold;
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
            <!-- Motorcycle Customization Card -->
            <a href="{{ route('motor') }}">
                <div class="card motor-card shadow-lg rounded-lg p-5 transition-transform transform">
                    <h2 class="text-xl font-semibold">Customize Motorcycle</h2>
                    <p class="text-gray-600">Total posts: {{ $motorCount }}</p>
                </div>
            </a>

            <!-- Community Hub Card -->
            <a href="{{ route('community') }}">
                <div class="card community-card shadow-lg rounded-lg p-5 transition-transform transform">
                    <h2 class="text-xl font-semibold">Community Hub</h2>
                    <p class="text-gray-600">Total posts: {{ $communityCount }}</p>
                </div>
            </a>
        </div>

        <!-- Feature Highlight Section -->
        <div class="spotlight mt-10">
            <div class="spotlight-card">
                <div class="spotlight-content">
                    <h2 class="text-2xl">Motorcycle of the Week</h2>
                    <p>Check out this incredible custom build from our community!</p>
                    <a href="http://127.0.0.1:8000/motor/1">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
