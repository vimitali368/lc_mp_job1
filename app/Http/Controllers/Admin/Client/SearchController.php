<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\FilterRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
//        FilterRequest $request
//        $data=$request->s;
//        dd($data);
        $clients = Client::where('region', '1')->get();
        return view('admin.client.search', compact('clients'));
    }
}
