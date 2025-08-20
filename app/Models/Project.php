<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'status',
        'start_date',
        'end_date',
        'created_at'
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'created_at' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id');
    }

    public function getHoursAttribute()
    {
        return $this->tasks()->sum('target_hour');
    }

    public function getWithHr()
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'hours' => $this->hours,
        ];
    }
}
