<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAssociationOrganization extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_association_organizations';

    protected $fillable = ['user_id', 'faculty_organization_code', 'position'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
