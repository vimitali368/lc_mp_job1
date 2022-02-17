<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Filters\ClientFilter;
use App\Http\Requests\Admin\Client\FilterRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        if (isset($data['delivery_cost_from'])) {
            $data = [
                'delivery_cost' => [
                    $data['delivery_cost_from'],
                    $data['delivery_cost_to']
                ]
            ];
        }
        if (isset($data['region'])) {
            $data = [
                'region' => explode(",", $data['region'])
            ];

        }
//        dd($data);
        $filter = app()->make(ClientFilter::class, [
            'queryParams' => array_filter($data)
        ]);
//        dd($filter);
        // Хардкор
        $regions = DB::table('clients')
            ->select('region')
            ->whereNotNull('region')
            ->whereNull('deleted_at')
            ->groupBy('region')
            ->get();
//        dd($regions);
//        $regions = Client::whereNotNull('region')->groupBy('region')->get();
//        $regions = Client::groupBy('region')->orderBy('region')->get();
//          SELECT
//              clients.region
//          FROM clients
//          WHERE
//              clients.region IS NOT NULL
//              AND clients.deleted_at IS NULL
//          GROUP BY clients.region
//          ORDER BY clients.region
        $clients = Client::filter($filter)->get();
//        dd($clients);
//        $clients = Client::where('name', 'like', "%{$data['name']}%")->get();
        return view('admin.client.search', compact('clients', 'regions'));
    }
}
