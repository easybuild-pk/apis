<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Resources\MaterialResource;
use App\Http\Resources\ProjectResource;
use App\Http\Responses\CreatedResponse;
use App\Http\Responses\SuccessResponse;
use App\Models\Material;
use App\Services\MaterialService;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectService;

    public function __construct()
    {
        $this->projectService = new ProjectService();
    }

    public function createProject(CreateProjectRequest $request)
    {
        $projectData = $request->validated();
        unset($projectData['materials']);
        $project = $this->projectService->createProject($request->user(), $projectData);
        (new MaterialService())->addProjectMaterials($project, $request->materials);
        $project = new ProjectResource($project);
        return CreatedResponse::toResponse('Project created successfully.', ['project' => $project]);
    }

    public function getProjects(Request $request)
    {
        $projects = ProjectResource::collection($request->user()->projects);
        $materials = MaterialResource::collection(collect(Material::all()));
        return SuccessResponse::toResponse('', ['projects' => $projects, 'materials' => $materials]);
    }
}
