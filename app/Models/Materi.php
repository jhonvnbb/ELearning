<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';

    protected $fillable = [
        'class_id',
        'pertemuan',
        'title',
        'content',
        'file_path',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}
