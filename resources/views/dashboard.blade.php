<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- ✅ Welcome Card --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-800 dark:text-gray-100 text-lg">
                    👋 Welcome back, <span class="font-semibold text-purple-600 dark:text-purple-300">{{ Auth::user()->name }}</span>!  
                    <p class="text-sm mt-2 text-gray-600 dark:text-gray-400">You're successfully logged in to your Task Manager.</p>
                </div>
            </div>

            {{-- ✅ Quick Access Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- All Tasks --}}
                <a href="{{ route('tasks.index') }}" class="block bg-purple-100 hover:bg-purple-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-purple-800 dark:text-purple-200 p-6 rounded-lg shadow-md transition">
                    <h3 class="text-xl font-bold mb-2">📋 View Tasks</h3>
                    <p class="text-sm text-purple-700 dark:text-purple-300">Check all your created tasks</p>
                </a>

                {{-- Add Task --}}
                <a href="{{ route('tasks.create') }}" class="block bg-green-100 hover:bg-green-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-green-800 dark:text-green-200 p-6 rounded-lg shadow-md transition">
                    <h3 class="text-xl font-bold mb-2">➕ Add Task</h3>
                    <p class="text-sm text-green-700 dark:text-green-300">Create a new task</p>
                </a>

                {{-- Profile --}}
                <a href="{{ route('profile.edit') }}" class="block bg-blue-100 hover:bg-blue-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-blue-800 dark:text-blue-200 p-6 rounded-lg shadow-md transition">
                    <h3 class="text-xl font-bold mb-2">🧑‍💼 Your Profile</h3>
                    <p class="text-sm text-blue-700 dark:text-blue-300">Manage your account settings</p>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
