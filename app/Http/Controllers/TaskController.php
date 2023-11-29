<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreate;
use App\Http\Requests\TaskUpdate;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id','desc')->paginate(10);
        return view('tasks.tasks', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskCreate $request)
    {
        Task::create($request->all());
    
        return redirect()->route('tasks.index')->with('success','Task created successfully.');
    }
    
    public function show(Task $task)
    {
        return view('tasks.edit',compact('task'));
    }
    
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    
    public function update(TaskUpdate $request, Task $task)
    {
        $task->update($request->all());
    
        return redirect()->route('tasks.index')->with('success','Task updated successfully');
    }
    
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task Deleted..');
    }
}
