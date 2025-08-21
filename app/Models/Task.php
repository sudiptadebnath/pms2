<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'sort_order',
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
        $start = $this->start_date;
        if (!$start) return 0;
        $end = $this->end_date ?? now();
        $weight = $this->user?->cur_hrs / $this->target_hour;
        return $this->used_hour + calcHr($start, $end, $weight);
    }
}
