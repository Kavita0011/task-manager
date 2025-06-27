<nav x-data="{ open: false }" class="bg-white text-primary dark:bg-gray-800 shadow-md border-b border-gray-200 dark:border-gray-700 py-3">
  <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-14">
    <div class="flex justify-between items-center min-h-[64px]">

      {{-- ✅ Left Side: Logo or App Name --}}
      <div class="text-xl font-bold text-purple-700">
        TaskManager
      </div>

      {{-- ✅ Right Side: Navigation Tabs --}}
      <div class="flex space-x-8 items-center">

        {{-- all tasks  --}}
        <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.index')">
          {{ __('All Tasks') }}
        </x-nav-link>
        {{-- Add Task Tab --}}
        <x-nav-link :href="route('tasks.create')" :active="request()->routeIs('tasks.create')">
          {{ __('Add Task') }}
        </x-nav-link>
       
      </div>
    </div>
  </div>
</nav>
