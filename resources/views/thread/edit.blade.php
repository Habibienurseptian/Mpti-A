<!-- resources/views/thread/edit.blade.php -->
@extends('layout.layout')

@section('content')
<div class="bg-white p-4 shadow mt-8">
    <form action="{{ route('threads.update', $thread->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="heading text-center font-bold text-2xl m-5 text-gray-800">Edit Post</div>
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <input name="title" class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text" value="{{ $thread->title }}">

            @error('title')
                <span class="p-2 text-sm text-red-500">{{ $message }}</span>
            @enderror
            <textarea name="content" class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this post here">{{ $thread->content }}</textarea>
            @error('content')
                <span class="p-2 text-sm text-red-500">{{ $message }}</span>
            @enderror

            <!-- Display current image (if available) -->
            <div class="mb-4 mt-4" id="imagePreviewContainer">
                @if ($thread->image)
                    <img id="imagePreview" src="{{ asset('storage/' . $thread->image) }}" alt="Current Image" class="w-full h-auto rounded-lg shadow-lg">
                @else
                    <p>No image uploaded</p>
                @endif
            </div>

            <!-- File upload icon -->
            <div class="icons flex text-gray-500 m-2 items-center">
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                <label for="image" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </label>
                <input id="image" name="image" type="file" class="hidden" accept="image/*" onchange="previewImage(event)">
                <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
            </div>

            <!-- buttons -->
            <div class="buttons flex justify-end space-x-4 mt-6">
                <!-- Cancel Button -->
                <a href="/" class="btn-cancel flex items-center justify-center border border-gray-300 p-2 px-6 rounded-lg font-semibold cursor-pointer text-gray-700 hover:bg-gray-200 transition duration-300 ease-in-out">
                    <span class="text-sm">Cancel</span>
                </a>

                <!-- Update Post Button -->
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-600 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Update
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    // Function to preview the selected image
    function previewImage(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('imagePreview');

        // If a file is selected, show the new image preview
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                // Set the image source to the selected file
                if (previewImage) {
                    previewImage.src = e.target.result;
                } else {
                    const newImage = document.createElement('img');
                    newImage.id = 'imagePreview';
                    newImage.src = e.target.result;
                    newImage.className = 'w-full h-auto rounded-lg shadow-lg';
                    previewContainer.innerHTML = ''; // Clear the current preview
                    previewContainer.appendChild(newImage);
                }
            };
            reader.readAsDataURL(file); // Read the image file as a Data URL
        }
    }
</script>
@endsection
