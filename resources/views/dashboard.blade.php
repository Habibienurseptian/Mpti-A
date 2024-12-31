@extends('layout.layout')

@section('content')
<div class="flex flex-col lg:flex-row">
    <!-- Right Sidebar -->
    @include('shared.right_sidebar')

    <!-- Main Content -->
    <main class="flex-1">
        <div class="p-10 ">
            @if(!request()->has('search') || request()->get('search') == '')
                @include('shared.submit_threads')
            @endif
        </div>

        <!-- Content Feed -->
        <div class="space-y-2 md:p-0 p-2">
            @forelse ( $threads as $thread )
                @include('shared.thread_card')
            @empty
                <p class="text-center font-semibold font-sans">No result found</p>
            @endforelse
        </div>
    </main>

    <!-- Left Sidebar -->
    @include('shared.left_sidebar')
</div>

<script>
// Loop through each toggle button and add an event listener to it
document.querySelectorAll('[id^="toggleCommentBtn_"]').forEach(button => {
    button.addEventListener('click', function() {
        // Get the thread ID from the button's ID (extract part after 'toggleCommentBtn_')
        const threadId = this.id.split('_')[1];

        // Find the corresponding comment section using the thread ID
        const commentsSection = document.getElementById('commentSection_' + threadId);

        // Toggle the hidden class to show/hide the comments section
        commentsSection.classList.toggle('hidden');
        console.log('Toggled comments for thread ' + threadId);
    });
});

</script>
@endsection

