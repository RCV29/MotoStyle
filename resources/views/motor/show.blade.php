<x-app-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-4xl font-bold mb-6 text-center">My Customize Motorcycles</h1>
        
        <div class="mb-6 text-center">
            <a href="{{ route('motor.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 transition duration-200 inline-block">
                Upload Customize Motorcycle
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-4xl">
            @foreach($motor as $item)
                <div class="bg-white border border-gray-300 rounded-lg shadow p-4 hover:shadow-lg transition duration-200">
                    <div class="flex justify-center mb-2 p-4">
                        <img src="{{ asset($item->image) }}" class="w-32 h-32 object-cover rounded" alt="img"/>
                    </div>
                    <h2 class="text-lg font-semibold mb-2 text-center">{{ $item->name }}</h2>
                    <p class="text-gray-700 text-center">{{ $item->description }}</p>

                    <div class="mt-4 flex justify-center space-x-4">
                        <a href="{{ route('motor.edit', $item->id) }}" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600 transition duration-200">
                            Edit
                        </a>
                        
                        <form action="{{ route('motor.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-black px-4 py-2 rounded hover:bg-red-600 transition duration-200" onclick="return confirm('Are you sure you want to delete this motor?');">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
