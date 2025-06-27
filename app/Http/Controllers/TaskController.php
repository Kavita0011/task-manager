<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Laravel controller to handle task logic: CRUD + image upload.
class TaskController extends Controller
{
    // Show list of tasks
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show create form
    public function create()
    {
        return view('tasks.create');
    }

    // Store new task
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'due_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        $data['user_id'] = auth()->id();
        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // Show edit form
    public function edit(Task $task)
    {
        $this->authorizeTask($task);
        return view('tasks.edit', compact('task'));
    }

    // Update task
    public function update(Request $request, Task $task)
    {
        $this->authorizeTask($task);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'due_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            // delete old image
            if ($task->image) {
                Storage::disk('public')->delete($task->image);
            }

            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // Delete task
    public function destroy(Task $task)
    {
        $this->authorizeTask($task);

        if ($task->image) {
            Storage::disk('public')->delete($task->image);
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    // Private method to restrict access
    private function authorizeTask(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }
    }
}
