<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'class_id',
        'pertemuan',
        'title'
    ];

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}
