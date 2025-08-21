<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $table = "user";
    protected $fillable = ['uid', 'email', 'password', 'logged_at', 'stat', 'role'];
    protected $hidden = ['password'];
    protected $casts = [
        'logged_at' => 'datetime',
    ];
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_user', 'user_id', 'project_id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id', 'id');
    }
    public function getTotalHoursAttribute()
    {
        return $this->tasks()->sum('target_hour');
    }
    public function getHoursAttribute()
    {
        return $this->tasks()
            ->whereIn('status', ['p', 's'])
            ->sum('target_hour');
    }
    public function getCurHrsAttribute()
    {
        return $this->tasks()
            ->whereIn('status', ['s'])
            ->sum('target_hour');
    }

    public function getWithHr()
    {
        return [
            'id'    => $this->id,
            'name'  => $this->uid,
            'hours' => $this->hours,
        ];
    }
}
