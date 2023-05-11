<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    use HasFactory;

    protected $table = 'study_programs';
    protected $fillable = ['study_name', 'faculty_id',];
    public $timestamps = false;

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
