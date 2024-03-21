<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function create(TaskRequest $request)
    {
        Task::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        Session::flash('status', 'Task added successfully!');

        return to_route('task.new');
    }

    public function complete(Request $request)
    {
        $task_id = $request->task_id();
        $task = Task::findOrFail($task_id);
        $task->save();

        return redirect()->back();
    }

    public function find(Request $request)
    {

    }
    public function delete(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
        ]);
        Task::find($request->task_id())->delete();

        Session::flash('status', 'Task delete successfully!');

        return redirect()->back();
    }
    public function list(Request $request)
    {
        $user_id = $request->user()->id;
        $task = Task::where('user_id', $user_id)->get();
        $tasks = $task->where('completed', false);

        return route('task.list', compact('tasks'));
    }

    public function completed(Request $request)
    {
        $user_id = $request->user()->id();
        $task = Task::where('user_id', $user_id)->get();
        $tasks = $task->where('completed', true);

        return route('task.completed', compact('tasks'));
    }
    public function edit(Request $request)
    {

    }

}
