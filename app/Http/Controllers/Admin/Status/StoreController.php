<?php

namespace App\Http\Controllers\Admin\Status;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Status\StoreRequest;
use App\Models\ImportStatus;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
//        dd($request);
//        dd(
//            auth()->id() ?? '?',
//            Auth::id() ?? '?',
//            $request->user()->id ?? '?',
//            auth()->check(),
//            get_class(auth()->guard())
//        );
        $request['user_id'] = auth()->user()->id;
        $data = $request->validated();
        ImportStatus::create($data);
//        return redirect()->route('admin.status.index');
    }
}
