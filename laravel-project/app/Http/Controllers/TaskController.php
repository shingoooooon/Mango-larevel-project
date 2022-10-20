<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Folder $folder) {

        $folders = Folder::latest()->get();
        $tasks = Task::where('folder_id', $folder->id)->get();

        return view('tasks/index', [
            'folders' => $folders,
            'tasks'  => $tasks,
        ]);
    }
}
