<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug', 'name', 'description',
    ];

    protected $dates = ['deleted_at'];

    public function roles() 
    {
    	return $this->belongsToMany(Role::class, 'roles_permissions');
    }
}
