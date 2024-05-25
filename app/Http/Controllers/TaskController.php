<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'task' => 'required|max:100|min:5',
        ]);

        // Ensure the task is assigned correctly
        $task = new Task();
        $task->task = $validated['task']; // Use the validated data
        $task->save();

        // Redirect back to the task list page
        return redirect('/task')->with('status', 'Task created successfully!');
    }

    public function updatetask($id)
    {
        // Find the task by ID and update its status
        $task = Task::find($id);
        if ($task) {
            $task->isCompleted = 1;
            $task->save();
        }
        
        return redirect()->back();
    }

    public function notupdatetask($id)
    {
        // Find the task by ID and update its status
        $task = Task::find($id);
        if ($task) {
            $task->isCompleted = 0;
            $task->save();
        }
        
        return redirect()->back();
    }

    public function deletetask($id)
    {
        // Find the task by ID and delete it
        $task = Task::find($id);
        if ($task) {
            $task->delete();
        }
        
        return redirect()->back();
    }

    public function updatetasks($id)
    {
        $data = Task::find($id);
        return view("update")->with("taskdata", $data);
    }

    public function uptodate(Request $request)
    {
        $id = $request->id;
        $task = $request->task;
        $data = Task::find($id);
        
        if ($data) {
            $data->task = $task;
            $data->save();
        }
        
        return redirect('/task');
    }

    public function showTasks()
    {
        $tasks = Task::all();
        return view('task', ['data' => $tasks]);
    }
}
