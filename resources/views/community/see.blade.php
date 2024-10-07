<x-app-layout>
    <div class="flex flex-col md:flex-row p-6 space-x-6">
        <!-- Community Details Section (Left Side) -->
        <div class="w-full md:w-1/4 mb-6"> 
            <div class="bg-white shadow-md rounded-lg p-4">
                <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $community->name }}</h1>

                <div class="flex justify-center mb-4">
                    <img src="{{ asset($community->image) }}" class="w-32 h-32 object-cover rounded-lg" alt="{{ $community->name }}" />
                </div>
                <p class="text-gray-700 mb-4 text-lg">{{ $community->description }}</p>
            </div>
        </div>

        <!-- Create Comment Section (Right Side) -->
        <div class="w-full md:w-3/4 mb-6"> 
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-xl font-bold mb-4 text-gray-800">Create Comment</h2>

                <!-- Feedback message for comment submission -->
                @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-2 mb-4 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('community.comment', $community->id) }}">
                    @csrf
                    <textarea name="comment" rows="2" class="border rounded-lg w-full p-1 mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Write your comment..." required></textarea>
                    <button type="submit" class="bg-blue-500 text-black px-3 py-1 rounded-lg hover:bg-blue-600 transition duration-200">
                        Submit
                    </button>
                </form>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold mb-2 text-gray-800">Comments</h3>
                    <ul class="space-y-2">
                        @foreach($comments as $comment)
                            <li class="text-gray-700 border-b pb-1">
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
