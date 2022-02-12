<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class EditController extends Controller
{
    public function __invoke(Fertilizer $fertilizer)
    {
        return view('admin.fertilizer.edit', compact('fertilizer'));
    }
}
