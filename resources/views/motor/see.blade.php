<x-app-layout>
    <div class="flex flex-col md:flex-row p-6 space-x-6">
        <!-- Customized Motorcycle Section (Left Side) -->
        <div class="w-full md:w-1/3 mb-6"> 
            <div class="bg-white shadow-lg rounded-lg p-4 border border-gray-300">
                <h1 class="text-2xl font-bold mb-4 text-gray-800">Customized Motorcycle</h1>
                <div class="flex justify-center mb-4">
                    <img src="{{ asset($motor->image) }}" class="w-48 h-32 object-cover rounded-lg" alt="{{ $motor->name }}" />
                </div>
            </div>
        </div>

        <!-- Comment Section (Right Side) -->
        <div class="w-full md:w-2/3 mb-6"> 
            <div class="bg-white shadow-lg rounded-lg p-4 border border-gray-300">
                <h2 class="text-xl font-bold mb-4 text-gray-800">Create Comment</h2>

                <!-- Feedback message for comment submission -->
                @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-2 mb-4 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('motor.comment', $motor->id) }}">
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
