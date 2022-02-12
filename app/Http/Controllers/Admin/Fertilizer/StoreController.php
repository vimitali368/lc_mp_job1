<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\StoreRequest;
use App\Models\Fertilizer;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Fertilizer::firstOrCreate($data);
        return redirect()->route('admin.fertilizer.index');
    }
}
