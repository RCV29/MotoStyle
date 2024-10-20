<x-app-layout>
    <h1 class="text-lg font-semibold text-center">Create Motor</h1>
    <div class="max-w-xs mx-auto mt-6 p-4 bg-white rounded-lg shadow-md border border-gray-200">
        <form method="POST" action="{{ route('motorstore') }}" enctype="multipart/form-data">
            @csrf
            @method('post')

            <!-- Image Upload -->
            <div class="mt-4">
                <x-input-label for="image" :value="__('Image')" />
                <input type="file" id="image" name="image" class="block mt-1 w-full border rounded-md shadow-sm" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full border rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input id="description" class="block mt-1 w-full border rounded-md shadow-sm" type="text" name="description" :value="old('description')" required />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
