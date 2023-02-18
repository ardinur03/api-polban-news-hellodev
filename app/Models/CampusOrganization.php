<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusOrganization extends Model
{
    use HasFactory;

    protected $table = 'campus_organizations';
    protected $fillable = ['code', 'name'];
    protected $primaryKey = 'code';

    public $timestamps = false;

    public function studentCenterNews()
    {
        return $this->hasMany(StudentCenterNew::class, 'campus_organization_code', 'code');
    }
}
