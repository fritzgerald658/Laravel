<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function home()
    {
        $tasks = Task::all();
        return view('todo.home', ['tasks' => $tasks]);
    }

    // go to the add task page
    public function updateTask(Task $task)
    {
        $task->update(['is_completed' => true]);
        return response()->json(['is_completed' => $task->is_completed,]);
    }

    // store the values from the add task form
    public function storeTask(Request $request)
    {
        $data = $request->validate([
            'task_title' => 'required|string|max:255',
            'task_description' => 'nullable|string|max:255'
        ]);

        $task = Task::create($data);
        return response()->json([
            'id' => $task->id,
            'task_title' => $task->task_title,
            'task_description' => $task->task_description,
            'is_completed' => $task->is_completed,
            'csrf_token' => csrf_token(), // Send CSRF token
        ]);
    }

    public function destroyTask(Task $task)
    {
        $task->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
