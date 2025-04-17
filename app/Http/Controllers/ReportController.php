<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show($projectId)
    {
        $project = Project::with([
            'tasks.status',
            'tasks.remarks'
        ])->where('id', $projectId)->where('user_id', auth()->id())->firstOrFail();

        return response()->json($project);
    }
}
