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

    public function siswa()
    {
        return $this->belongsToMany(User::class, 'class_user', 'class_id', 'user_id');
    }


    public function guru()
    {
        return $this->belongsToMany(User::class, 'class_guru', 'class_id', 'user_id');
    }



}

