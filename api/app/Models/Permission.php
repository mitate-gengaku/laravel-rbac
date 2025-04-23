<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Permission extends SpatieRole
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'guard_name',
    ];

    protected $hidden = [
        'pivot',
    ];
}
