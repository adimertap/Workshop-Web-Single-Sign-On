<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('pages.singlesignon.password.edit');
    }

    public function update()
    {
        dd('changed');
    }
}
