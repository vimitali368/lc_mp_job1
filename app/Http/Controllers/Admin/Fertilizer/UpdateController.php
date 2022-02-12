<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\UpdateRequest;
use App\Models\Fertilizer;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Fertilizer $client)
    {
        $data = $request->validated();
        $client->update($data);
        return redirect()->route('admin.client.show', compact('client'));
    }
}
