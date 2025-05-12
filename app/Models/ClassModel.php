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

    public function siswa()
    {
        return $this->belongsToMany(User::class, 'class_user', 'class_id', 'user_id');
    }

    public function guru()
    {
        return $this->belongsToMany(User::class, 'class_guru', 'class_id', 'user_id');
    }

    public function materials()
    {
        return $this->hasMany(Materi::class, 'class_id');
    }
    
    public function quizzes() {
        return $this->hasMany(Quiz::class, 'class_id');
    }
    

}

