<div class="">
    <!-- Post Card 1 -->
    <div class="bg-white p-4 mt-2 items-center shadow-sm border border-gray-200 w-full max-w-2xl mx-auto sm:w-10/12">
        <div class="flex flex-col items-start space-x-4">
            <!-- User Profile Image and Username -->
            <div class="flex justify-between items-center w-full">
                <!-- User Profile Image and User Name -->
                <div class="flex flex-1 flex-row gap-2">
                    <img src="{{ $thread->user->getImageURL() }}" alt="Avatar" class="rounded-md w-10 h-10 object-cover aspect-[1/1]">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('users.show', $thread->user->id) }}">
                            <div class="text-sm font-semibold text-gray-800">{{ $thread->user->name }}</div>
                        </a>
                        <div class="text-xs text-gray-500">{{ $thread->created_at }}</div>
                    </div>
                </div>

                <!-- Dropdown for Edit and Delete -->
               @include('shared.dropdown_card')
            </div>


            
            @if ($editing ?? false)
                <!-- Thread Card Edit -->
                @include('thread.edit')
            @else
                <div class="mt-2 w-full max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Post Title -->
                    <a href="{{ route('threads.show', $thread->id) }}">
                        <h2 class="text-2xl font-semibold text-gray-900">{{ $thread->title }}</h2>
                    </a>

                    <!-- Post Content -->
                    <p class="mt-4 text-gray-700 text-base md:text-lg leading-relaxed">{{ $thread->content }}</p>

                    <!-- Post Image -->
                    @if ($thread->image)
                        <img src="{{ asset('storage/'.$thread->image) }}" alt="Post Image" class="mt-4 rounded-lg shadow-sm w-full h-auto">
                    @endif

                </div>
                <!-- Interaction Buttons (like, comment, etc.) -->
                @include('shared.interaction_button')
                
            @endif
        </div>
        <!-- Comment Form Row -->
        @include('shared.comments_box')
    </div>
</div>