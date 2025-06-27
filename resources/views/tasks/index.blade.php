{{-- Purpose: Display all tasks created by the logged-in user --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-4">

        {{-- ✅ Page Heading and Logout --}}
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">My Tasks</h1>

            {{-- ✅ Logout Button --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="text-lg text-red-600 dark:text-red-400 hover:underline font-semibold transition duration-200">
                    🚪 Logout
                </button>
            </form>
        </div>


        {{-- ✅ Add New Task Button --}}
        <a href="{{ route('tasks.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded mb-6 inline-block">
            + Add Task
        </a>

        {{-- ✅ Success Flash Message --}}
        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- ✅ Task Listing --}}
        @forelse($tasks as $task)
            {{-- Use Carbon for due date comparison --}}
            @php
                $due = \Carbon\Carbon::parse($task->due_date);
            @endphp

            {{-- ✅ Task Card --}}
            <div
                class="flex flex-col sm:flex-row justify-between items-start sm:items-center border p-6 rounded-xl mb-6 
                    bg-white dark:bg-gray-800 shadow-md hover:shadow-lg transition duration-300">

                {{-- ✅ Left: Task Info --}}
                <div class="flex-1 sm:pr-6">
                    {{-- Title --}}
                    <h2 class="text-2xl font-semibold text-purple-700 dark:text-purple-300 mb-1">{{ $task->title }}</h2>

                    {{-- Description --}}
                    <p class="text-gray-700 dark:text-gray-300 mb-2">{{ $task->description }}</p>

                    {{-- Due Date --}}
                    @if ($due->isPast())
                        <p class="text-sm text-red-600 dark:text-red-400 font-semibold">
                            📅 Due: {{ $task->due_date }}
                            ({{ $due->isToday() ? 'Today!' : 'Expired' }})
                        </p>
                    @else
                        <p class="text-sm text-green-600 dark:text-green-400">
                            📅 Due: {{ $task->due_date }} (Upcoming)
                        </p>
                    @endif

                    {{-- Edit / Delete --}}
                    <div class="mt-2 space-x-4">
                        <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:underline">✏️ Edit</a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Delete this task?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">🗑 Delete</button>
                        </form>
                    </div>
                </div>

                {{-- ✅ Right: Task Image --}}
                @if ($task->image)
                    <div class="mt-4 sm:mt-0 sm:ml-6">
                        <img src="{{ asset('storage/' . $task->image) }}" alt="Task Image"
                            class="w-48 h-32 object-cover rounded-md shadow">
                    </div>
                @endif

            </div>

        @empty
            {{-- ✅ No tasks available --}}
            <p class="text-gray-600 dark:text-gray-300">No tasks yet.</p>
        @endforelse

    </div>
@endsection
