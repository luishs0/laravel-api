<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $projects = Project::all();
        if ($projects) {
            return response()->json([
                'success' => true,
                'projects' => $projects
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'No projects'
            ]);
        }
    }
}
