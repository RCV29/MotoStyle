<x-app-layout>
    <style>
        /* Container Styling */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Page Title */
        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        /* Button Styling */
        .upload-button {
            background-color: #4A5568; /* Gray-800 */
            color: white;
            border: 2px solid #4A5568; /* Gray-800 */
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.2s;
            font-size: 16px;
            font-weight: 500;
        }

        .upload-button:hover {
            background-color: #2D3748; /* Gray-700 */
        }

        /* Card Styling */
        .card {
            background-color: white;
            border: 1px solid #E2E8F0; /* Gray-200 */
            border-radius: 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 16px;
            transition: box-shadow 0.2s;
            text-align: center;
            height: 280px; /* Adjusted height for bigger image */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 180px; /* Increased image size */
            height: 180px; /* Increased image size */
            object-fit: cover;
            border-radius: 12px;
        }

        /* Responsive Behavior */
        @media (max-width: 768px) {
            h1 {
                font-size: 28px;
            }

            .upload-button {
                width: 100%; /* Full-width button on smaller screens */
            }

            .card {
                height: auto; /* Remove fixed height for smaller screens */
            }
        }
    </style>

    <div class="container mx-auto flex flex-col items-center">
        <h1 class="text-lg font-semibold text-center mb-6">Community Hub</h1>
        
        <div class="mb-6">
            <button onclick="window.location.href='{{ route('community.create') }}'" class="upload-button">
                {{ __('Upload') }}
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-4xl">
            @foreach($community as $item)
                <div class="card">
                    <a href="{{ route('community.see', $item->id) }}" class="block">
                        <div class="flex justify-center mb-2 p-4">
                            <img src="{{ asset($item->image) }}" alt="Community Image" />
                        </div>
                        <h2 class="text-lg font-semibold">{{ $item->name }}</h2>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
