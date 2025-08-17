<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'title',
        'description',
        'status',
        'start_date',
        'end_date',
        'target_hour',
        'used_hour',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getUsedHour1Attribute()
    {
        if (!is_null($this->used_hour) && $this->used_hour != 0) {
            return $this->used_hour;
        }
        
        $start = $this->start_date;
        if (!$start) return 0;

        $end = $this->end_date ?? now();
        return $start->diffInHours($end);
    }
}
