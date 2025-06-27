{{-- Purpose: Reusable form for both Create and Edit --}}
{{-- Assumes optional $task variable is passed --}}

{{-- Title --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
    <input type="text" name="title" placeholder="Enter task title"
        value="{{ old('title', $task->title ?? '') }}"
        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition duration-200">
</div>

{{-- Description --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
    <textarea name="description" rows="4" placeholder="Describe the task"
        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition duration-200">{{ old('description', $task->description ?? '') }}</textarea>
</div>

{{-- Image --}}
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Task Image</label>
    <input type="file" name="image" accept="image/*" onchange="previewImage(event)"
        class="block vw-full text-sm text-gray-500 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">

<div id="preview-container" class="mt-4">
    <img id="image-preview" src="#" alt="Preview"
        class="w-32 h-32 rounded-md object-cover hidden border border-gray-300 dark:border-gray-600">
</div>
</div>

{{-- Due Date --}}
<div>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Due Date</label>
    <input type="date" name="due_date"
        value="{{ old('due_date', isset($task) ? $task->due_date : '') }}"
        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition duration-200">
</div>

{{-- Submit --}}
<div class="pt-4">
    <button type="submit"
        class="w-full bg-purple-600 hover:bg-purple-700 font-semibold py-3 px-4 rounded-md shadow-md transition-all duration-300">
        {{ isset($task) ? '✏️ Update Task' : '➕ Create Task' }}
    </button>
</div>


<script>
    function previewImage(event) {
        const image = document.getElementById('image-preview');
        const file = event.target.files[0];
        if (file) {
            image.src = URL.createObjectURL(file);
            image.classList.remove('hidden');
        }
    }
    
    // ✅ Show already uploaded image if editing
    document.addEventListener('DOMContentLoaded', function () {
     const existing = "{{ isset($task) && $task->image ? asset('storage/' . $task->image) : '' }}";
   const preview = document.getElementById('image-preview');
        if (existing && preview) {
            preview.src = existing;
            preview.classList.remove('hidden');
        }
    });

</script>

