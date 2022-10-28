<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolder;
use App\Models\Folder;
use Illuminate\Http\Request;
use function PHPUnit\Framework\lessThanOrEqual;

class FolderController extends Controller
{
    public function create() {
        return view('folders/create');
    }

    public function store(CreateFolder $request) {
        $folder = new Folder();
        $folder->title = $request->title;
        $folder->user_id = auth()->user()->id;
        $folder->save();

        return redirect()
            ->route('tasks.index', $folder)
            ->with('message', 'Folder created successfully!');
    }

    public function destroy(Folder $folder)
    {
        $folder->delete();

        $first_folder = auth()->user()->folders()->first();

        if($first_folder)
        {
            return redirect()
                ->route('tasks.index', $first_folder)
                ->with('message', 'Folder had deleted successfully!');
        }
        else
        {
            return redirect('/home')
                ->with('message', 'Folder had deleted successfully!');
        }
    }
}
