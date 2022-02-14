<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;

class SoftController extends Controller
{
    public function __invoke()
    {
        $clients = Client::onlyTrashed()->get();
        return view('admin.client.soft', compact('clients'));
    }
}
