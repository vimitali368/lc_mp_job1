<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Models\Fertilizer;

class StoreController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        Fertilizer::firstOrCreate($data);
        return redirect()->route('admin.fertilizer.index');
    }
}
