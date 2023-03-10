<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCenterNew extends Model
{
    use HasFactory;

    protected $table = 'student_center_news';
    protected $fillable = ['new_id', 'category_id', 'campus_organization_code'];

    // function assesor untuk mengubah format waktu
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function new()
    {
        return $this->belongsTo(News::class, 'new_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function campusOrganization()
    {
        return $this->belongsTo(CampusOrganization::class, 'campus_organization_code', 'code_campus_organization');
    }
}
