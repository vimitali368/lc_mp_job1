<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;

class ImportController extends Controller
{
    public function __invoke()
    {
        return view('admin.culture.import');
    }
}
