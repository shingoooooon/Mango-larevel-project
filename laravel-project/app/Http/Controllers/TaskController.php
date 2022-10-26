<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
use const Grpc\STATUS_ABORTED;

class TaskController extends Controller
{
    public function index(Folder $folder)
    {

        $folders = auth()->user()->folders;
        $tasks = Task::where('folder_id', $folder->id)->paginate(4);

        return view('tasks/index', [
            'current_folder' => $folder,
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
        $task->folder_id = $folder->id;
        $task->save();

        return redirect()
            ->route('tasks.index', $folder)
            ->with('message', 'Task created successfully!');

    }

    // arguments order matters
    public function edit(Folder $folder, Task $task)
    {
        return view('tasks/edit', [
            'task' => $task
        ]);
    }

    public function update(Folder $folder, Task $task, EditTask $request)
    {
        $task->name = $request->name;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()
            ->route('tasks.index', $folder)
            ->with('message', 'Task edited successfully!');
    }

    public function destroy(Folder $folder, Task $task)
    {
        $task->delete();

        return redirect()
            ->route('tasks.index', $folder)
            ->with('message', 'Task deleted successfully!');

    }
}
