<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class ShowController extends Controller
{
    public function __invoke(Fertilizer $client)
    {
        return view('admin.client.show', compact('client'));
    }
}
