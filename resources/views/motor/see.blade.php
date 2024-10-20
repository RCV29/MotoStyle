<x-app-layout>
    <h1 class="text-lg font-semibold text-center">Customized Details</h1>
    
    <div class="max-w-md mx-auto mt-6 p-4 bg-white rounded-lg shadow-md border border-gray-200">
        <div class="flex justify-center mb-4">
            <img src="{{ asset($motor->image) }}" class="w-120 h-70 object-cover rounded-lg" alt="{{ $motor->name }}" />
        </div>
        <h2 class="text-xl font-bold text-center mb-2">{{ $motor->name }}</h2>
        <p class="text-gray-700 text-center">{{ $motor->description }}</p>
    </div>

    <div class="max-w-lg mx-auto mt-6 p-4 bg-white rounded-lg shadow-md border border-gray-200">
        
        <!-- Feedback message for comment submission -->
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 mb-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('motor.comment', $motor->id) }}">
            @csrf
            <textarea name="comment" rows="1" class="border rounded-lg w-full p-1 mb-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Write your comment..." required></textarea>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>

        <div class="mt-4">
            <h3 class="text-lg font-semibold mb-2 text-gray-800">Comment Section</h3>
            <ul class="space-y-2">
                @foreach($comments as $comment)
                    <li class="text-gray-700 border-b pb-1">
                        <span class="text-sm">
                            <strong> - {{ $comment->user ? $comment->user->name : 'Anonymous' }}</strong>
                        </span>
                        <p>{{ $comment->comment }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
