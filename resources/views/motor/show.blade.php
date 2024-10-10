<x-app-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-lg font-semibold text-center mb-6">My Customizes</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-4xl">
            @foreach($motor as $item)
                <div class="bg-white border border-gray-300 rounded-lg shadow p-4 hover:shadow-lg transition duration-200">
                    <div class="flex justify-center mb-2 p-4">
                        <img src="{{ asset($item->image) }}" class="w-32 h-32 object-cover rounded" alt="img"/>
                    </div>
                    <h2 class="text-lg font-semibold mb-2 text-center">{{ $item->name }}</h2>
                    <p class="text-gray-700 text-center">{{ $item->description }}</p>

                    <div class="mt-4 flex justify-center">
                        <a href="{{ route('motor.edit', $item->id) }}" class="bg-gray-800 text-white border-2 border-gray-800 px-4 py-2 rounded-md hover:bg-gray-700 transition duration-200" style="margin-right: 10px;">
                            Edit
                        </a>
                        
                        <form action="{{ route('motor.destroy', $item->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white border-2 border-red-600 px-4 py-2 rounded-md hover:bg-red-700 transition duration-200" style="margin-left: 10px;">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
