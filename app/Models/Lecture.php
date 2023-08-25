<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'link',
        'video',
        'file',
        'section_id'
    ];

    public function course()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
