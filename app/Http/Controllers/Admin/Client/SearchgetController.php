<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class SearchgetController extends Controller
{
    public function __invoke(Client $client)
    {
        $regions = DB::table('clients')
            ->select('region')
            ->whereNotNull('region')
            ->whereNull('deleted_at')
            ->groupBy('region')
            ->get();
        $clients = Client::all();
        return view('admin.client.searchget', compact('clients', 'regions'));
    }
}
