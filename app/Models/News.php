<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class News extends Model
{
    use HasFactory, SoftDeletes, Sluggable, CausesActivity, LogsActivity;

    protected $table = 'news';
    protected $fillable = ['user_id', 'slug', 'title', 'brief_overview', 'content', 'status', 'reading_time'];

    // function assesor untuk mengubah format waktu
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function studentAssociationNew()
    {
        return $this->hasOne(StudentAssociationNew::class, 'new_id', 'id');
    }

    public function studentCenterNew()
    {
        return $this->hasOne(StudentCenterNew::class, 'new_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'news_id', 'id');
    }

    public function bookmark()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Master ' . $this->table)
            ->logFillable();
    }
}
