<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';
    protected $fillable = ['name', 'token'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'class_user');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'class_id');
    }

}

