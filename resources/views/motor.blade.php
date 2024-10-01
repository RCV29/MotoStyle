<x-app-layout>
    <div class="flex flex-col items-center">
        <h1 class="text-2xl font-bold mb-4">Motors</h1>
        
        <div class="mb-6">
            <a href="{{ route('motorcreate') }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                Create a Motor
            </a>
        </div>

        <div class="overflow-x-auto w-full max-w-4xl">
            <table class="min-w-full bg-white border border-gray-300 mx-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600">
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motor as $item)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
