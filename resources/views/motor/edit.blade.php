<x-app-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-4xl font-bold mb-6">My Customize Motorcycles</h1>
        
        <div class="mb-6">
        <a href="{{ route('motor.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200 inline-block">
            Upload Customize Motorcycle
        </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-4xl">
            @foreach($motor as $item)
                <div class="bg-white border border-gray-300 rounded-lg shadow p-4 hover:shadow-lg transition duration-200">
                    <h2 class="text-lg font-semibold mb-2">{{ $item->name }}</h2>
                    <p class="text-gray-700">{{ $item->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
