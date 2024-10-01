<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white shadow-lg rounded-lg p-5 transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold">Users</h2>
                <p class="text-gray-600">Total users: <span class="font-bold">120</span></p>
            </div>

            <a href="{{ route('motor') }}">
            <div class="bg-white shadow-lg rounded-lg p-5 transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold">Customize Motorcycle</h2>
                <p class="text-gray-600">10 New Post</p>
            </div>
            </a>
            
            <a href="{{ route('community') }}">
            <div class="bg-white shadow-lg rounded-lg p-5 transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold">Community Hub</h2>
                <p class="text-gray-600">14 New Post</p>
            </div>
            </a>
        </div>

        <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-4">Recent Activity</h2>
            <ul class="bg-white shadow-lg rounded-lg">
                <li class="p-4 border-b last:border-b-0">User John Doe logged in.</li>
                <li class="p-4 border-b last:border-b-0">User Jane Smith created an order.</li>
                <li class="p-4 border-b last:border-b-0">User Alex Brown updated their profile.</li>
            </ul>
        </div>
    </div>
</x-app-layout>