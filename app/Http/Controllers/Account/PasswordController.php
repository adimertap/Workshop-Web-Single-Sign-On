<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('pages.singlesignon.password.edit');
    }

    public function update()
    {
        request()->validate([
            'old_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            return back()->with('success', 'Anda berhasil mengubah password Anda');
        } else {
            return back()->with('error', 'Pastikan Anda mengisi password Anda saat ini');
        }
    }
}
