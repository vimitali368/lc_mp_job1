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
        $filter = app()->make(ClientFilter::class, [
            'queryParams' => array_filter($data)
        ]);
//        dd($filter);
        $clients = Client::filter($filter)->get();
//        dd($clients);
        //        if ($data) {
//            dd($data);
//            dd($data['name']);
//        }

//        $clients = Client::where('name', 'like', "%{$data['name']}%")->get();
        return view('admin.client.search', compact('clients'));
    }
}
