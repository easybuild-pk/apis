<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    /* Relationships */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, ProjectMaterialPivot::class, 'project_id', 'material_id');
    }

}
