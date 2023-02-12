<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyOrganization extends Model
{
    use HasFactory;

    protected $table = 'faculty_organizations';
    protected $fillable = ['code', 'name',];
    protected $primaryKey = 'code';
    protected $incrementing = false;
}
