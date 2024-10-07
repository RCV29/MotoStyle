<x-app-layout>
    <div class="flex flex-col md:flex-row md:space-x-6 p-6">
        <!-- Motor Details Section -->
        <div class="flex-1">
            <div class="bg-white shadow-md rounded-lg p-4">
                <h1 class="text-4xl font-bold mb-4 text-gray-800">{{ $motor->name }}</h1>

                <div class="mb-4">
                    <img src="{{ asset($motor->image) }}" class="w-full h-32 object-cover rounded-lg mb-4" alt="{{ $motor->name }}" />
                </div>

                <p class="text-gray-700 mb-4 text-lg">{{ $motor->description }}</p>

                <a href="{{ route('motor') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200">
                    Back to Motors
                </a>
            </div>
        </div>

        <!-- Create Comment Section -->
        <div class="w-full md:w-1/3 mb-6">
            <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Create Comment</h2>

                <!-- Feedback message for comment submission -->
                @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-4 mb-4 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('motor.comment', $motor->id) }}">
                    @csrf
                    <textarea name="comment" rows="4" class="border rounded-lg w-full p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Write your comment here..." required></textarea>
                    <button type="submit" class="bg-blue-500 text-black px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                        Submit
                    </button>
                </form>

                <div class="mt-6">
                    <h3 class="text-2xl font-semibold mb-2 text-gray-800">Comments</h3>
                    <ul class="list-disc pl-5">
                        @foreach($comments as $comment)
                            <li class="text-gray-700 mb-2">
                                <p>{{ $comment->comment }}</p>
                                <span class="text-sm text-gray-500">- <em>by {{ $comment->user ? $comment->user->name : 'Anonymous' }}</em></span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
