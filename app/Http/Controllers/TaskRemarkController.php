<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TestRemark;
use Illuminate\Http\Request;

class TaskRemarkController extends Controller
{
    public function store(Request $request, $taskId)
    {
        $request->validate([
            'remark' => 'required|string',
        ]);

        $task = Task::findOrFail($taskId);

        if ($task->project->user_id != auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return TestRemark::create([
            'task_id' => $task->id,
            'remark' => $request->remark,
        ]);
    }
}
