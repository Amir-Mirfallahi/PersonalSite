<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index () {
        $count = request('count', 6); // default count is 6 if not provided in the request
        $projects = Project::query()->orderBy("id", "desc")->paginate($count)->onEachSide(1);
        return response()->json(ProjectResource::collection($projects));
    }
}
