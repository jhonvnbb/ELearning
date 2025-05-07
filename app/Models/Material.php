<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['class_id', 'title', 'content'];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}
