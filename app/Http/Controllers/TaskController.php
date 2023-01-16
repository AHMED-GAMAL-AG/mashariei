<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Project $project)
    {
        $data = request()->validate([
            'body' => 'required',
        ]);

        $data['project_id'] = $project->id; // to link the added task with the current project

        Task::create($data);
        return back();
    }

    public function update(Project $project, Task $task)
    {


        $task->update([
            // the checkbox return "on" if clicked else return nothing so use has() if done contains any thing(on) return 1 else 0
            'done' => request()->has('done')
        ]);

        return back();
    }
}
