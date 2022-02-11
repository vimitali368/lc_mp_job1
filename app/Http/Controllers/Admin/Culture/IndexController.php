<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.cultures.index');
    }
}
