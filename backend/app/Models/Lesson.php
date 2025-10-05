<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'chapter_id',
        'name',
        'description',
        'order',
        'type',
    ];

    // Relationships
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
