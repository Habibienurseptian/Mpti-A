@auth
    <!-- Container for the button and dropdown -->
    <div class="relative inline-block">
        <!-- Icon Button for Dropdown -->
        <button onclick="toggleDropdown('dropdown-{{ $thread->id }}')" class="text-gray-600 hover:text-gray-800 p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div id="dropdown-{{ $thread->id }}" class="hidden absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-md border border-gray-300 sm:max-w-xs md:max-w-none z-10">
            <ul class="text-sm text-gray-700">
                @if(Auth::id() === $thread->user->id)
                    <!-- Dropdown Menu for Own Post -->
                    <li>
                        <a href="{{ route('threads.edit', $thread->id) }}" class="block px-4 py-2 hover:bg-gray-200">Edit</a>
                    </li>
                    <li>
                        <form action="{{ route('threads.destroy', $thread->id) }}" method="POST" class="px-4 py-2">
                            @csrf
                            @method('delete')
                            <button type="submit" class="w-full text-left text-red-500 hover:bg-gray-200">Delete</button>
                        </form>
                    </li>
                    <li>
                        <button onclick="toggleDropdown('dropdown-{{ $thread->id }}')" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Cancel</button>
                    </li>
                @else
                    <!-- Dropdown Menu for Other Users' Posts -->
                    <li>
                        <button onclick="reportPost({{ $thread->id }})" class="block w-full text-left px-4 py-2 hover:bg-gray-200 text-red-500">Report</button>
                    </li>
                    <li>
                        <button onclick="blockUser({{ $thread->user->id }})" class="block w-full text-left px-4 py-2 hover:bg-gray-200">Block</button>
                    </li>
                    <li>
                        <button onclick="muteUser({{ $thread->user->id }})" class="block w-full text-left px-4 py-2 hover:bg-gray-200">Mute</button>
                    </li>
                    <li>
                        <button onclick="toggleDropdown('dropdown-{{ $thread->id }}')" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Cancel</button>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endauth

<script>
    function toggleDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle('hidden');
    }

    function reportPost(postId) {
        // Handle reporting logic
        alert('Post ' + postId + ' has been reported.');
    }

    function blockUser(userId) {
        // Handle blocking logic
        alert('User ' + userId + ' has been blocked.');
    }

    function muteUser(userId) {
        // Handle muting logic
        alert('User ' + userId + ' has been muted.');
    }
</script>
