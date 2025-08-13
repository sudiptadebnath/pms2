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
}
