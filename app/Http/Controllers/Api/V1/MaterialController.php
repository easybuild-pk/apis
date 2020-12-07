<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\ProjectService;
use App\User;
use Exception;

class MaterialController extends Controller
{
    public function getProjectMaterials(User $user, $projectId)
    {
        $projectService = new ProjectService();
        $project = $projectService->findProject($projectId);
        throw_unless($projectService->myProject($user, $project), new Exception('The selected project id is invalid.'));
        return $project->materials;
    }
}
