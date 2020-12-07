<?php

namespace App\Services;

use App\Models\Material;
use App\Models\Project;

class MaterialService
{
    public function addProjectMaterials(Project $project, $materialIds)
    {
        $project->materials()->detach();
        $materials = Material::whereIn('id', explode(',', $materialIds))->get();
        $project->materials()->saveMany($materials);
        return $project;
    }
}
