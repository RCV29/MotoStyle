<x-app-layout>
    <h1 class="text-lg font-semibold text-center mb-6">Edit Concern</h1>
    <div class="max-w-lg mx-auto mt-6 p-6 bg-white rounded-lg shadow-md border border-gray-200">
        <form action="{{ route('community.update', $community->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Image Upload -->
            <div class="mt-4">
                <x-input-label for="image" :value="__('Change Image')" />
                <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/webp" class="block mt-1 w-full border rounded-md shadow-sm" />
                @error('image')
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                @enderror
            </div>

            <!-- Current Image Display -->
            <div class="mt-4 flex justify-center">
                <img src="{{ asset($community->image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded" />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full border rounded-md shadow-sm" type="text" name="name" :value="old('name', $community->name)" required autofocus autocomplete="name" />
                @error('name')
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                @enderror
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input id="description" class="block mt-1 w-full border rounded-md shadow-sm" type="text" name="description" :value="old('description', $community->description)" required />
                @error('description')
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
