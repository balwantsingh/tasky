<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'user_id', // this column represent task created by
        'assign_to',
        'message',
        'department_id',
        'deadline_id',
        'isActive',
        'status_id'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignTo()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function deadline()
    {
        return $this->belongsTo(Deadline::class, 'deadline_id');
    }

    public function scopeIsActive($query)
    {
        return $query->where('isActive',true);
    }

}
