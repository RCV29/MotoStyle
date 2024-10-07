<x-app-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-4xl font-bold mb-6">{{ $community->name }}</h1>
        
        <div class="mb-6">
            <img src="{{ asset($community->image) }}" class="w-32 h-32 rounded mb-4" alt="{{ $community->name }}" />
        </div>

        <p class="text-gray-700 text-center mb-4">{{ $community->description }}</p>

        <a href="{{ route('community') }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
            Back to Communities
        </a>
    </div>
</x-app-layout>