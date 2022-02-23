<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Culture;

class ImportController extends Controller
{
    public function __invoke()
    {
        return view('admin.fertilizer.import');
    }
}
