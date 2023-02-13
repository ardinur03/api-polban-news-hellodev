<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'news';
    protected $fillable = ['user_id', 'slug', 'title', 'brief_overview', 'content', 'reading_time'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function student_assosiacition_new()
    {
        return $this->belongsTo(StudentAssociationNew::class, 'new_id', 'id');
    }

    public function student_center_new()
    {
        return $this->hasOne(StudentCenterNew::class, 'new_id', 'id');
    }
}
