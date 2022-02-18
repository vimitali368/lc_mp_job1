<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Filters\ClientFilter;
use App\Http\Requests\Admin\Client\FilterRequest;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class SearchpostController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
//        dd($request);
//        $inputs = $request->all();
//        dd($inputs);
//        $r = json_encode($inputs['region']);
//        dd($r);
//        $r = $request->input('region');
//        $input['hobby'] = implode(',', $region);
        $data = $request->validated();
//        dd($data);
        if (!isset($data['name'])) {
            unset($data['name']);
        }
        if (isset($data['contract_date_from'])) {
            $data['contract_date'] = [
                $data['contract_date_from'],
                $data['contract_date_to']
            ];
        } else {
            unset($data['contract_date_from']);
            unset($data['contract_date_to']);
        }
//        dd($data);
        if (!isset($data['delivery_cost_from']) || !isset($data['delivery_cost_to'])) {
            unset($data['delivery_cost_from']);
            unset($data['delivery_cost_to']);
        } else {
            $data['delivery_cost'] = [
                $data['delivery_cost_from'],
                $data['delivery_cost_to']
            ];
        }
//        dd($data);
        if (!isset($data['regions'])) {
            unset($data['regions']);
        }
//        dd($data);
        if (isset($data['sort'])) {
            $data['sort'] = [
                $data['sort'],
                $data['order']
            ];
            unset($data['order']);
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
        return view('admin.client.searchget', compact('clients', 'regions'));
    }
}
