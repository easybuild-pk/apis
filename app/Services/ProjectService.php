<?php

namespace App\Services;

use App\Models\Project;
use App\User;

class ProjectService
{
    public function createProject(User $user, $data = [])
    {
        return Project::create(array_merge($data, [
            'user_id' => $user->id
        ]));
    }

    public function findProject($projectId)
    {
        return Project::find($projectId);
    }

    public function myProject(User $user, Project $project)
    {
        return $project->user_id === $user->id;
    }
}
