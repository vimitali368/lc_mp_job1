<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class SoftController extends Controller
{
    public function __invoke()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.user.soft', compact('users'));
    }
}
