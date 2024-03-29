<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class UserAssociationOrganization extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_association_organizations';

    protected $fillable = ['user_id', 'logo', 'faculty_organization_code', 'position'];

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['logo'] = $this->logo;
        return $toArray;
    }

    public function getLogoAttribute()
    {
        return url('') . Storage::url($this->attributes['logo']);
    }

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

    public function getLogoByUserId($id)
    {
        $logo = UserAssociationOrganization::where('user_id', $id)->first();
        if (!$logo) {
            return null;
        }
        return $logo->logo;
    }
}
