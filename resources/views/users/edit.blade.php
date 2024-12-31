@extends('layout.layout')

@section('content')
<div class="max-w-screen-md px-10 py-6 mx-4 mt-20 bg-white rounded-lg shadow md:mx-auto border-1">
    <h2 class="text-3xl font-semibold text-center mb-6">Edit Profile</h2>

    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Profile Picture -->
        <div class="flex justify-center mb-6">
            <div class="flex flex-col items-center">
                <div class="mb-4">
                    <!-- Make the profile image clickable to trigger the file input -->
                    <label for="image" class="cursor-pointer">
                        <img
                            id="profile-image"
                            src="{{ $user->getImageURL() ?? 'https://via.placeholder.com/150' }}"
                            alt="profile picture"
                            class="object-cover w-32 h-32 rounded-full border-2 border-gray-300"
                        />
                    </label>
                </div>
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="hidden"
                    accept="image/*"
                    onchange="previewImage(event)"
                />
            </div>
        </div>

        <!-- Username -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium">Username</label>
            <input
                type="text"
                name="name"
                value="{{ old('name', $user->name) }}"
                class="mt-2 p-2 w-full border border-gray-300 rounded-md"
                required
            />
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bio -->
        <div class="mb-4">
            <label for="bio" class="block text-gray-700 font-medium">Bio</label>
            <textarea
                name="bio"
                rows="4"
                class="mt-2 p-2 w-full border border-gray-300 rounded-md"
                placeholder="Write something about yourself"
            >{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center mt-6">
            <button
                type="submit"
                class="px-6 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300"
            >
                Save Changes
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profile-image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
