<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug', 'name', 'description',
    ];

    protected $dates = ['deleted_at'];

    public function permissions() 
    {
    	return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
