<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function data(Request $request)
    {
        $query = User::select(['id', 'uid', 'email', 'role', 'stat', 'created_at', 'logged_at'])
            ->orderBy('created_at', 'desc')
            ->get()->map(function ($row) {
                return [
                    'id' => $row->id,
                    'uid' => $row->uid,
                    'email' => $row->email,
                    'role' => roleDict()[$row->role] ?? $row->role,
                    'stat' => statDict()[$row->stat] ?? $row->stat,
                    'created_at' => optional($row->created_at)->format('d-m-Y H:i:s'),
                    'logged_at' => optional($row->logged_at)->format('d-m-Y H:i:s'),
                ];
            });

        return DataTables::of($query)->make(true);
    }

    public function get($id)
    {
        $user = User::find($id);
        if (!$user) return $this->err("No Such User");
        return $this->ok("User Detail", ["data" => $user]);
    }

    public function login(Request $request)
    {
        $err = $this->validate($request->all(), [
            'email' => ['required', function ($attribute, $value, $fail) {
                if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                } elseif (!preg_match('/^[a-zA-Z0-9@._-]+$/', $value)) {
                    $fail('User ID must be alphanumeric and may include @ . _ - characters.');
                }
            }],
            'password' => 'required',
        ]);
        if ($err) return $err;

        $user = User::where('email', $request->email)->orWhere('uid', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->stat == "i") {
                return $this->err("Account is inactive");
            }
            $user->logged_at = now();
            $user->save();
            $this->setUser($user);
            return $this->ok('Login Successfull');
        }
        return $this->err("Invalid Login Attempt");
    }

    public function register(Request $request)
    {
        $isAdminAdd = $request->filled('role');

        $rules = [
            'uid' => 'required|string|min:4|max:20|regex:/^[a-zA-Z0-9._-]+$/|unique:user,uid',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:6',
            'password2' => 'required|same:password',
        ];

        if ($isAdminAdd) {
            $rules['role'] = 'required';
            $rules['stat'] = 'required';
        }

        $err = $this->validate($request->all(), $rules);
        if ($err) return $err;

        $userData = [
            'uid' => $request->uid,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'logged_at' => now(),
        ];

        if ($isAdminAdd) {
            $userData['role'] = $request->role;
            $userData['stat'] = $request->stat;
        }

        $user = User::create($userData);

        // Auto login only if self-registered
        if (! $isAdminAdd) {
            $this->setUser($user);
        }

        return $this->ok($isAdminAdd ? 'User Saved Successfully' : 'Registration Successful');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) return $this->err("No Such User");

        $err = $this->validate($request->all(), [
            'uid' => 'required|string|min:4|max:20|regex:/^[a-zA-Z0-9._-]+$/|unique:user,uid,' . $id,
            'email' => 'required|email|unique:user,email,' . $id,
            'role' => 'required',
            'stat' => 'required',
            'password' => 'nullable|string|min:6',
            'password2' => 'nullable|same:password',
        ]);
        if ($err) return $err;


        // Update fields
        $user->uid = $request['uid'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->stat = $request['stat'];

        // Only update password if it's provided
        if (!empty($request['password'])) {
            $user->password = Hash::make($request['password']);
        }

        $user->save();
        return $this->ok('User Saved Successfully');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) return $this->err("No Such User");
        $user->delete();
        return $this->ok('User deleted successfully');
    }
}
