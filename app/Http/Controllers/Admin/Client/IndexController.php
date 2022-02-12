<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;

class IndexController extends Controller
{
    public function __invoke()
    {
        $clients = Client::all();
        return view('admin.client.index', compact('clients'));
    }
}
