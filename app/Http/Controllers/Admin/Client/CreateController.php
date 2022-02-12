<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.client.create');
    }
}
