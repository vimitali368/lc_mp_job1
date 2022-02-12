<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.culture.create');
    }
}
