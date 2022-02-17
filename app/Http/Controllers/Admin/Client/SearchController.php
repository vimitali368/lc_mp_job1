<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Filters\ClientFilter;
use App\Http\Requests\Admin\Client\FilterRequest;
use App\Models\Client;
use Illuminate\Http\Request;

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
//        dd($data);
        $filter = app()->make(ClientFilter::class, [
            'queryParams' => array_filter($data)
        ]);
//        dd($filter);
        $clients = Client::filter($filter)->get();
//        dd($clients);
//        $clients = Client::where('name', 'like', "%{$data['name']}%")->get();
        return view('admin.client.search', compact('clients'));
    }
}
