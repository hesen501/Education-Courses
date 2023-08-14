<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSummary extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
