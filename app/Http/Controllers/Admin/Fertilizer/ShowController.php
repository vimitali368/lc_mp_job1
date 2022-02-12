<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class ShowController extends Controller
{
    public function __invoke(Fertilizer $fertilizer)
    {
        return view('admin.fertilizer.show', compact('fertilizer'));
    }
}
