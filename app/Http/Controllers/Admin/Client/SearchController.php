<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Filters\FertilizerFilter;
use App\Http\Requests\Admin\Client\FilterRequest;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
//        dd($request);
        $data = $request->validated();
//        dd($data);
        if (isset($data['contract_date_from'])) {
            $data = [
                'contract_date' => [
                    $data['contract_date_from'],
                    $data['contract_date_to']
                ]
            ];
        }
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
        if (isset($data['sort'])) {
            $data = [
                'sort' => [
                    $data['sort'],
                    $data['order']
                ]
            ];
        }
//        dd($data);
        $filter = app()->make(FertilizerFilter::class, [
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
