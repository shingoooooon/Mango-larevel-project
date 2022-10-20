<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTask;
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Folder $folder)
    {

        $folders = Folder::latest()->get();
        $tasks = Task::where('folder_id', $folder->id)->get();

        return view('tasks/index', [
            'current_folder_id' => $folder->id,
            'folders' => $folders,
            'tasks'  => $tasks,
        ]);
    }

    public function create(Folder $folder)
    {
        return view('tasks/create', [
            'folder' => $folder
        ]);
    }

    public function store(Folder $folder, CreateTask $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->due_date = $request->due_date;
        $folder->tasks()->save($task);

        return redirect()
            ->route('tasks.index', $folder)
            ->with('message', 'task created successfully!');

    }
}
