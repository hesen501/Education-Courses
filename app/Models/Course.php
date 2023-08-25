<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'image',
        'background_image',
        'price',
        'requirements',
        'target_student',
        'permalink',
        'min_point',
        'quiz_status',
        'certificate_status',
        'time_limit_status',
        'language_id',
        'currency_id',
    ];
    // public function language()
    // {
    //     return $this->belongsTo(Language::class,'language_id');
    // }

    // public function currency()
    // {
    //     return $this->belongsTo(Currency::class,'currency_id');
    // }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function courseSummary()
    {
        return $this->hasMany(CourseSummary::class);
    }

    public function ages()
    {
        return $this->belongsToMany(Age::class, CourseAge::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, CourseCategory::class);
    }
}
