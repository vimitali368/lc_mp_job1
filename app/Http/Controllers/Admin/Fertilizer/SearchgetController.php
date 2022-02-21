<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\Fertilizer;
use Illuminate\Support\Facades\DB;

class SearchgetController extends Controller
{
    public function __invoke()
    {
        $cultures = Culture::all();
//        dd($cultures);
// Хардкор
        $districts = DB::table('fertilizers')
            ->select('district')
            ->whereNotNull('district')
            ->whereNull('deleted_at')
            ->groupBy('district')
            ->get();
//        dd($districts);
        $costs = DB::table('fertilizers')
            ->select('cost')
            ->whereNotNull('cost')
            ->whereNull('deleted_at')
            ->groupBy('cost')
            ->get();
//        dd($costs);
        $fertilizers = Fertilizer::all();
        return view('admin.fertilizer.searchget', compact('fertilizers', 'cultures', 'districts', 'costs'));
    }
}
