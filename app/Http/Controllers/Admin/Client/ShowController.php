<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ShowController extends Controller
{
    public function __invoke(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }
}
