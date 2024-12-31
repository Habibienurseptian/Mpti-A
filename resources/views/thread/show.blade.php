@extends('layout.layout')

@section('content')
<div class="flex flex-col lg:flex-row">
    <!-- Sidebar -->
    @include('shared.right_sidebar')

    <!-- Main Content -->
    <main class="flex-1 mt-20 p-4">
        @include('shared.thread_card')
    </main>

    <!-- Sider untuk desktop -->
    @include('shared.left_sidebar')
  </div>

@endsection
