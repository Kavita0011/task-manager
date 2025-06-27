{{-- Purpose: Show a form to edit an existing task. --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-2xl bg-white dark:bg-gray-800 shadow-xl rounded-xl border border-gray-200 dark:border-gray-700 transition-all duration-300">

        {{-- ✅ Card Header --}}
        <div class="px-8 py-6 bg-gradient-to-r from-purple-600 to-pink-500 rounded-t-xl">
            <h2 class="text-3xl font-bold text-white">📝 Edit Task</h2>
            <p class="text-sm text-pink-100 mt-1">Update your task details below.</p>
        </div>

        {{-- ✅ Edit Form --}}
        <form action="{{ route('tasks.update', $task->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="px-8 py-6 space-y-6">
            @csrf
            @method('PUT')

            {{-- Shared Form --}}
            @include('tasks._form', ['task' => $task])
        </form>
    </div>
</div>
@endsection

