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

        /* Recent Activity Section */
        .mt-10 {
            margin-top: 40px;
        }

        .text-2xl {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .bg-white ul {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            list-style-type: none;
            padding: 0;
        }

        .p-4 {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            color: #333;
        }

        .p-4:last-child {
            border-bottom: none;
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
            <a href="{{ route('motor') }}">
                <div class="bg-white card shadow-lg rounded-lg p-5 transition-transform transform">
                    <h2 class="text-xl font-semibold">Customize Motorcycle</h2>
                    <p class="text-gray-600">Total posts: {{ $motorCount }}</p>
                </div>
            </a>

            <a href="{{ route('community') }}">
                <div class="bg-white card shadow-lg rounded-lg p-5 transition-transform transform">
                    <h2 class="text-xl font-semibold">Community Hub</h2>
                    <p class="text-gray-600">Total posts: {{ $communityCount }}</p>
                </div>
            </a>
        </div>
    </div>
</x-app-layout>
