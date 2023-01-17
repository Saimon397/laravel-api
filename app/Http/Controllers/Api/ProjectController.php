<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::with('languages', 'type')->paginate(3);
        return response()->json([
            'succes' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('languages', 'type')->where('slug', $slug)->first();
        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Projects not found'
            ]);
        }
    }
}
