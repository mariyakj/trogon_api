<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request, $projectId)
    {
        $request->validate([
            'title' => 'required|string',
            'status_id' => 'required|exists:status,id',
        ]);

        $project = Project::where('id', $projectId)->where('user_id', auth()->id())->firstOrFail();

        return Task::create([
            'project_id' => $project->id,
            'title' => $request->title,
            'status_id' => $request->status_id,
        ]);
    }

    public function updateStatus(Request $request, $taskId)
    {
        $request->validate([
            'status_id' => 'required|exists:status,id',
        ]);

        $task = Task::findOrFail($taskId);
        $project = $task->project;

        if ($project->user_id != auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $task->status_id = $request->status_id;
        $task->save();

        return $task;
    }
}
