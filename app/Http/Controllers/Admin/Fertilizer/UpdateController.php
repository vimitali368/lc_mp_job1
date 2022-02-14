<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\UpdateRequest;
use App\Models\Fertilizer;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Fertilizer $fertilizer)
    {
        $data = $request->validated();
        $fertilizer->update($data);
        return redirect()->route('admin.fertilizer.show', compact('fertilizer'));
    }
}
