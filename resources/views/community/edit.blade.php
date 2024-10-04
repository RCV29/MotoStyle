<x-app-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-4xl font-bold mb-6">Edit Motorcycle</h1>

        <form action="{{ route('community.update', $community->id) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $community->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @error('name')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $community->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Change</label>
                <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/webp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('image')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <img src="{{ asset($community->image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded" />
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                    Update Motorcycle
                </button>
                <a href="{{ route('community') }}" class="text-blue-500 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
