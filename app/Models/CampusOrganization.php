<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusOrganization extends Model
{
    use HasFactory;

    protected $table = 'campus_organizations';
    protected $fillable = ['code_campus_organization', 'name_campus_organization'];
    protected $primaryKey = 'code_campus_organization';
    public $incrementing = false;

    public $timestamps = false;

    public function studentCenterNews()
    {
        return $this->hasMany(StudentCenterNew::class, 'campus_organization_code', 'code');
    }
}
