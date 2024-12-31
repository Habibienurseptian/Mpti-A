@auth
<form action="{{ route('threads.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">New Post</div>
    <div class="editor mx-auto w-full sm:w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <input name="title" class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text">
        @error('title')
            <span class="p-2 text-sm text-red-500">{{ $message }}</span>
        @enderror
        <textarea name="content" class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this post here"></textarea>
        @error('content')
            <span class="p-2 text-sm text-red-500">{{ $message }}</span>
        @enderror
        
        <!-- icons -->
        <div class="icons flex text-gray-500 m-2 items-center justify-start">
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
            
            <!-- File upload icon -->
            <label for="image" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </label>
            <input id="image" name="image" type="file" class="hidden" accept="image/*" onchange="previewImage(event)">
        </div>

        <!-- Display selected image with cancel button -->
        <div id="image-preview" class="mt-4 text-center hidden">
            <img id="image-preview-img" src="" alt="Selected Image" class="max-w-full h-auto mb-2" />
            <button type="button" id="cancel-image" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Cancel Image</button>
        </div>

        <!-- <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div> -->
        
        <!-- buttons -->
        <div class="buttons flex flex-wrap justify-between space-x-4">
            <!-- Tombol Post (diubah ke kanan) -->
            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105 shadow-md hover:shadow-xl mt-2 sm:mt-0 ml-auto">
                Post
            </button>
        </div>
    </div>
</form>
@endauth

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('image-preview-img');
        const previewContainer = document.getElementById('image-preview');
        const cancelButton = document.getElementById('cancel-image');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                previewContainer.classList.remove('hidden');
                cancelButton.classList.remove('hidden'); // Show the cancel button
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.classList.add('hidden');
            previewContainer.classList.add('hidden');
            cancelButton.classList.add('hidden'); // Hide the cancel button
        }
    }

    // Function to cancel the selected image
    document.getElementById('cancel-image')?.addEventListener('click', function() {
        const fileInput = document.getElementById('image');
        const preview = document.getElementById('image-preview-img');
        const previewContainer = document.getElementById('image-preview');
        
        // Clear file input and hide the preview image
        fileInput.value = '';
        preview.src = '';
        preview.classList.add('hidden');
        previewContainer.classList.add('hidden');
        this.classList.add('hidden'); // Hide the cancel button
    });
</script>
