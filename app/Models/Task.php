<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Carbon\CarbonPeriod;


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

        $holidays = [
            '2025-01-26',
            '2025-08-15',
            '2025-10-02',
        ];

        $workStart = "09:30";
        $workEnd   = "18:00";
        $lunchStart = "13:30";
        $lunchEnd   = "14:00";
        $maxHoursPerDay = 8.0;

        $totalHours = 0;

        $period = CarbonPeriod::create($start->copy()->startOfDay(), $end->copy()->endOfDay());

        foreach ($period as $date) {
            // Skip Sat, Sun, and holidays
            if ($date->isWeekend() || in_array($date->toDateString(), $holidays)) {
                continue;
            }

            // Build workday boundaries for this date
            $dayStart = $date->copy()->setTimeFromTimeString($workStart);
            $dayEnd   = $date->copy()->setTimeFromTimeString($workEnd);
            $lunchS   = $date->copy()->setTimeFromTimeString($lunchStart);
            $lunchE   = $date->copy()->setTimeFromTimeString($lunchEnd);

            // Clamp actual start/end within working hours
            $currentStart = $start->greaterThan($dayStart) ? $start : $dayStart;
            $currentEnd   = $end->lessThan($dayEnd) ? $end : $dayEnd;

            if ($currentStart < $dayEnd && $currentEnd > $dayStart) {
                $diff = $currentStart->diffInMinutes($currentEnd) / 60;

                // Deduct lunch if time spans across it
                if ($currentStart < $lunchE && $currentEnd > $lunchS) {
                    $diff -= 0.5;
                }

                $totalHours += min($diff, $maxHoursPerDay);
            }
        }

        return $this->used_hour + $totalHours;
    }
}
