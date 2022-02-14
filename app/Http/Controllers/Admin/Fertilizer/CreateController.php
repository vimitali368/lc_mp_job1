<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Culture;

class CreateController extends Controller
{
    public function __invoke()
    {
        $cultures = Culture::all();
        return view('admin.fertilizer.create', compact('cultures'));
    }
}
