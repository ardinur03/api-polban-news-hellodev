<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyOrganization extends Model
{
    use HasFactory;

    protected $table = 'faculty_organizations';
    protected $fillable = ['code_faculty_organization', 'faculty_id', 'name_faculty_organization'];
    protected $primaryKey = 'code_faculty_organization';
    public $incrementing = false;
    public $timestamps = false;

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }
}
