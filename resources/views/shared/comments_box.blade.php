<div id="commentSection_{{ $thread->id }}" class="hidden w-full">
    <div class="mt-6 flex items-center space-x-3 w-full">
        <!-- User Profile Image -->
        <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full w-10 h-10">

        <!-- Comment Input -->
        <form id="commentForm_{{ $thread->id }}" action="{{ route('threads.comments.store', $thread->id) }}" method="POST" class="flex w-full">
            @csrf
            <!-- Input field aligned to the left with some margin from the profile image -->
            <input name="content" type="text" placeholder="Write a comment..." class="p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full" required />

            <!-- Submit Button -->
            <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">
                Post
            </button>
        </form>
    </div>


    <!-- Comment Section with Replies -->
    <div class="mt-6 space-y-4 ">
        <!-- Comment 1 -->
        @foreach ($thread->comments as $comment)
        <div class="border-t p-6 pt-4">
            <div class="flex items-start space-x-3">
                <!-- User Profile Image -->
                <img src="https://via.placeholder.com/40" alt="User Avatar" class="rounded-full w-10 h-10">
                <div class="flex-1">
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-semibold text-gray-800">{{ $comment->user->name }}</div>
                        <div class="text-xs text-gray-500"></div>
                    </div>
                    <p class="text-gray-700 mt-1">{{ $comment->content }}</p>
                    <!-- Reply Button -->
                    <button class="mt-2 text-sm text-blue-500 hover:text-blue-600">Reply</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
