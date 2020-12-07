<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectMaterialPivot extends Pivot
{
    protected $table = 'project_materials';
    protected $guarded = ['created_at', 'updated_at'];
}
