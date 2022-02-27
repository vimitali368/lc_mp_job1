<?php

namespace App\Http\Controllers\Admin\Status;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Status\StoreRequest;
use App\Models\ImportStatus;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        dd($request);
        $data = $request->validated();
        dd($data);
        ImportStatus::firstOrCreate($data);
        return redirect()->route('admin.status.index');
    }
}
