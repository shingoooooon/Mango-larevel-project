<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolder;
use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function create() {
        return view('folders/create');
    }

    public function store(CreateFolder $request) {
        $folder = new Folder();
        $folder->title = $request->title;
        $folder->save();

        return redirect()``
            ->route('tasks.index', $folder)
            ->with('message', 'folder created successfully!');
    }
}
