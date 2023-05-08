<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculties';
    protected $fillable = ['faculty_name'];
    public $timestamps = false;

    public function faculty_organizations()
    {
        return $this->hasMany(FacultyOrganization::class, 'faculty_id', 'id');
    }
}
