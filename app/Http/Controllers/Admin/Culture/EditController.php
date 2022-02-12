<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Culture;

class EditController extends Controller
{
    public function __invoke(Culture $culture)
    {
        return view('admin.culture.edit', compact('culture'));
    }
}
