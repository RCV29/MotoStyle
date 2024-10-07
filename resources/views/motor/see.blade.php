<x-app-layout>
    <div class="flex">
        <!-- Motor Details Section -->
        <div class="flex-1 flex flex-col items-start mr-6">
            <h1 class="text-4xl font-bold mb-6">{{ $motor->name }}</h1>
            
            <div class="mb-6">
                <img src="{{ asset($motor->image) }}" class="w-32 h-32 rounded mb-4" alt="{{ $motor->name }}" />
            </div>

            <p class="text-gray-700 mb-4">{{ $motor->description }}</p>

            <a href="{{ route('motor') }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                Back to Motors
            </a>
        </div>

        <!-- Create Comment Section -->
        <div class="w-1/3">
            <h2 class="text-2xl font-bold mb-4">Create Comment</h2>

            <!-- Feedback message for comment submission -->
            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('motor.comment', $motor->id) }}">
                @csrf
                <textarea name="comment" rows="4" class="border rounded w-full p-2 mb-4" placeholder="Write your comment here..." required></textarea>
                <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                    Submit
                </button>
            </form>

            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-2">Comments</h3>
                <ul class="list-disc pl-5">
                    @foreach($comments as $comment)
                        <li class="text-gray-700 mb-1">{{ $comment->comment }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
