@extends('layout.layout')

@section('content')
<div class="flex flex-col lg:flex-row">
    <!-- Sidebar -->
    @include('shared.right_sidebar')

    <!-- Main Content -->
    <main class="flex-1">
        @include('shared.user_card')
        <div class="space-y-5 md:p-0 p-2">
          @forelse ( $threads->sortByDesc('created_at') as $thread )
              @include('shared.thread_card')
          @empty
              <p class="text-center font-semibold font-sans">No result found</p>
          @endforelse

          <div class="mt-4 px-4">
            {{ $threads->links() }}
          </div>
        </div>
    </main>

    <!-- Sider untuk desktop -->
    @include('shared.left_sidebar')
</div>
@endsection
