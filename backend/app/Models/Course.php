<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'language',
        'teacher_id',
    ];

    // Relationships
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
