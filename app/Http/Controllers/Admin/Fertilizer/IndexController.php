<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class IndexController extends Controller
{
    public function __invoke()
    {
        $fertilizers = Fertilizer::all();
        return view('admin.fertilizer.index', compact('fertilizers'));
    }
}
