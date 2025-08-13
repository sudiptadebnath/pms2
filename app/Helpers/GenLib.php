<?php

use Carbon\Carbon;

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
