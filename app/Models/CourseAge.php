<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAge extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'age_id'
    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function age(){
        return $this->belongsTo(Age::class,'age_id');
    }
}
