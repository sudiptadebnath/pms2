<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

abstract class Controller
{
    protected function ok($msg = "Ok", $opt = [], $status = 200)
    {
        $ans = ["success" => true, "msg" => $msg];
        if ($opt) $ans = array_merge($ans, $opt);
        return response()->json($ans, $status);
    }

    protected function err($msg, $opt = [], $status = 200)
    {
        $ans = ["success" => false, "msg" => "SERVER: $msg"];
        if ($opt) $ans = array_merge($ans, $opt);
        return response()->json($ans, $status);
    }

    public function hello()
    {
        return $this->ok("hello");
    }

    protected function validate($itms, $ruls)
    {
        $validator = Validator::make($itms, $ruls);

        if ($validator->fails()) {
            return $this->err(implode("<br>", $validator->errors()->all()));
        }

        return false;
    }
}
