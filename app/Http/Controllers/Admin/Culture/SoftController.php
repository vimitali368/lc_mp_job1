<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Culture;

class SoftController extends Controller
{
    public function __invoke()
    {
        $cultures = Culture::onlyTrashed()->get();
        return view('admin.culture.soft', compact('cultures'));
    }
}
