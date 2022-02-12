<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;

class EditController extends Controller
{
    public function __invoke(Client $client)
    {
        return view('admin.client.edit', compact('client'));
    }
}
