<?php

namespace App\Http\Controllers\Admin\Status;

use App\Http\Controllers\Controller;
use App\Models\ImportStatus;

class IndexController extends Controller
{
    public function __invoke()
    {
        $statuses = ImportStatus::all();
        return view('admin.status.index', compact('statuses'));
    }
}
