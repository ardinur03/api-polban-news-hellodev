<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssociationNew extends Model
{
    use HasFactory;

    protected $table = 'student_association_news';
    protected $fillable = ['new_id', 'category_id', 'faculty_organization_code',];

    // function assesor untuk mengubah format waktu
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function news()
    {
        return $this->belongsTo(News::class, 'new_id', 'id');
    }

    public function faculty_organization()
    {
        return $this->belongsTo(FacultyOrganization::class, 'faculty_organization_code', 'code_faculty_organization');
    }
}
