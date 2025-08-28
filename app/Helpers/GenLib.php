<?php

use App\Models\Setting;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

if (!function_exists('hasRole')) {
    function hasRole($roles)
    {
        $user = session('user');
        return $user && isset($user['role']) && str_contains($roles, $user['role']);
    }
}

if (!function_exists('userLogged')) {
    function userLogged()
    {
        return !empty(session('user'));
    }
}

if (!function_exists('getUsrProp')) {
    function getUsrProp($ky)
    {
        return (session('user') ?? [])[$ky] ?? "";
    }
}

if (!function_exists('roleDict')) {
    function roleDict($typ = 0)
    {
        $dict = [
            "s" => "Superadmin",
            "a" => "Admin",
            "m" => "Manager",
            "w" => "Staff",
            "c" => "Client",
        ];
        return $typ == 1 ? array_flip($dict) : $dict;
    }
}

if (!function_exists('statDict')) {
    function statDict($typ = 0)
    {
        $dict = [
            "a" => "Active",
            "i" => "Inactive",
        ];
        return $typ == 1 ? array_flip($dict) : $dict;
    }
}

if (!function_exists('projStatDict')) {
    function projStatDict($typ = 0)
    {
        $dict = [
            "p" => "Planned",
            "a" => "Active",
            "c" => "Completed",
        ];
        return $typ == 1 ? array_flip($dict) : $dict;
    }
}

if (!function_exists('taskStatDict')) {
    function taskStatDict($typ = 0)
    {
        $dict = [
            "p" => "Pending",
            "s" => "Started",
            "c" => "Completed",
            "f" => "Failed",
            "a" => "Abandoned",
        ];
        return $typ == 1 ? array_flip($dict) : $dict;
    }
}

if (!function_exists('dtfmt')) {
    function dtfmt($typ = 0)
    {
        return ["dd-MM-yyyy", "DD-MM-YYYY"][$typ] ?? "dd-MM-yyyy";
    }
}

if (!function_exists('dttmfmt')) {
    function dttmfmt($typ = 0)
    {
        return ["dd-MM-yyyy HH:mm", "DD-MM-YYYY HH:mm"][$typ] ?? "dd-MM-yyyy HH:mm";
    }
}

if (!function_exists('dtsql')) {
    function dtsql($vl, $typ = 0)
    {
        $fmt = ["d-m-Y"][$typ] ?? "d-m-Y";
        try {
            return Carbon::createFromFormat($fmt, $vl)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}

if (!function_exists('dttmsql')) {
    function dttmsql($vl, $typ = 0)
    {
        $fmt = ["d-m-Y H:i"][$typ] ?? "d-m-Y H:i";
        try {
            return Carbon::createFromFormat($fmt, $vl)->format('Y-m-d H:i:s');
        } catch (\Exception $e) {
            return null;
        }
    }
}

if (!function_exists('calcHr')) {
    function calcHr($start, $end, $weight)
    {

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
        return $totalHours * $weight;
    }
}



if (!function_exists('setting')) {
    function setting(string|array $key, $def = "")
    {
        $dbkey = is_array($key) ? array_shift($key) : $key;
        $val = Setting::where('key', $dbkey)->value('val');
        if ($val == null) return $def;
        if (!is_array($key) || empty($key)) return $val;
        $valjson = json_decode($val, true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($valjson)) {
            return $def;
        }
        $result = $valjson;
        foreach ($key as $pathKey) {
            if (is_array($result) && array_key_exists($pathKey, $result)) {
                $result = $result[$pathKey];
            } else {
                return $def;
            }
        }
        return $result;
    }
}

if (!function_exists('set_setting')) {
    function set_setting(string $key, $val)
    {
        if (is_array($val) || is_object($val)) {
            $val = json_encode($val, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
        return Setting::updateOrCreate(
            ['key' => $key],
            ['val' => $val]
        );
    }
}
