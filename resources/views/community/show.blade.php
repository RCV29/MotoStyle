<x-app-layout>
<<<<<<< HEAD
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            background-color: white;
            border: 1px solid #E2E8F0; /* Gray-200 */
            border-radius: 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 16px;
            transition: box-shadow 0.2s;
            text-align: center;
            height: 280px; /* Adjusted height */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 200px; /* Adjust image size */
            height: 200px; /* Adjust image size */
            object-fit: cover;
            border-radius: 12px;
        }

        .card-image img {
            width: 200px; /* Adjust image size */
            height: 200px; /* Adjust image size */
            object-fit: cover;
            border-radius: 12px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card-description {
            display: none; /* Hide the description element */
        }

        .card-actions {
            display: flex;
            justify-content: center;
        }

        .edit-button {
            background-color: #4A5568; /* Gray-800 */
            color: white;
            border: 2px solid #4A5568; /* Gray-800 */
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.2s;
            font-size: 16px;
            font-weight: 500;
            margin-right: 10px;
        }
        .delete-button {
            background-color: #D30000; 
            color: white;
            border: 2px solid #D30000; 
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.2s;
            font-size: 16px;
            font-weight: 500;
            margin-right: 10px;
        }

        .edit-button:hover {
            background-color: #2D3748; 
        }

        .delete-button:hover {
            background-color: #800000; 
        }
        .card {
            height: auto; /* Remove fixed height for smaller screens */
        }
    </style>
    <div class="container flex flex-col items-center">
        <h1 class="text-lg font-bold text-center mb-6">My Concerns</h1>
=======
    <div class="flex flex-col items-center">
        <h1 class="text-lg font-semibold text-center mb-6">My Concerns</h1>
>>>>>>> ff244c12083992819897cef35a2590646157f8c3
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-4xl">
            @foreach($community as $item)
                <div class="card">
                    <div class="card-image flex justify-center">
                        <img src="{{ asset($item->image) }}" class="image-size" alt="img">
                    </div>
<<<<<<< HEAD
                    <h2 class="card-title text-center">{{ $item->name }}</h2>
                    <p class="card-description text-center">{/* Hide the description */}</p>
                    <div class="card-actions flex justify-center">
                        <a href="{{ route('community.edit', $item->id) }}" class="edit-button">Edit</a>
                        <form action="{{ route('community.destroy', $item->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Delete</button>
=======
                    <h2 class="text-lg font-semibold mb-2 text-center">{{ $item->name }}</h2>

                    <div class="mt-4 flex justify-center">
                        <a href="{{ route('community.edit', $item->id) }}" class="bg-gray-800 text-white border-2 border-gray-800 px-4 py-2 rounded-md hover:bg-gray-700 transition duration-200" style="margin-right: 10px;">
                            Edit
                        </a>
                        
                        <form action="{{ route('community.destroy', $item->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white border-2 border-red-600 px-4 py-2 rounded-md hover:bg-red-700 transition duration-200" style="margin-left: 10px;">
                                Delete
                            </button>
>>>>>>> ff244c12083992819897cef35a2590646157f8c3
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>