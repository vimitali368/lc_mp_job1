<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Filters\FertilizerFilter;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Models\Culture;
use App\Models\Fertilizer;
use Illuminate\Support\Facades\DB;

class SearchpostController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
//        dd($request);

        $data = $request->validated();
//        dd($data);
        if (!isset($data['name'])) {
            unset($data['name']);
        }
//        dd($data);

        if (isset($data['norm_nitrogen_from']) && isset($data['norm_nitrogen_to'])) {
            $data['norm_nitrogen'] = [
                $data['norm_nitrogen_from'],
                $data['norm_nitrogen_to']
            ];
            unset($data['norm_nitrogen_from']);
            unset($data['norm_nitrogen_to']);
        }
        if (!isset($data['norm_nitrogen_from'])) {
            unset($data['norm_nitrogen_from']);
        }
        if (!isset($data['norm_nitrogen_to'])) {
            unset($data['norm_nitrogen_to']);
        }
//        dd($data);

        if (isset($data['norm_phosphorus_from']) && isset($data['norm_phosphorus_to'])) {
            $data['norm_phosphorus'] = [
                $data['norm_phosphorus_from'],
                $data['norm_phosphorus_to']
            ];
            unset($data['norm_phosphorus_from']);
            unset($data['norm_phosphorus_to']);
        }
        if (!isset($data['norm_phosphorus_from'])) {
            unset($data['norm_phosphorus_from']);
        }
        if (!isset($data['norm_phosphorus_to'])) {
            unset($data['norm_phosphorus_to']);
        }
//        dd($data);

        if (isset($data['norm_potassium_from']) && isset($data['norm_potassium_to'])) {
            $data['norm_potassium'] = [
                $data['norm_potassium_from'],
                $data['norm_potassium_to']
            ];
            unset($data['norm_potassium_from']);
            unset($data['norm_potassium_to']);
        }
        if (!isset($data['norm_potassium_from'])) {
            unset($data['norm_potassium_from']);
        }
        if (!isset($data['norm_potassium_to'])) {
            unset($data['norm_potassium_to']);
        }
//        dd($data);

        if (!isset($data['culture_ids'])) {
            unset($data['culture_ids']);
        }
//        dd($data);

        if (!isset($data['districts'])) {
            unset($data['districts']);
        }
//        dd($data);

        if (!isset($data['costs'])) {
            unset($data['costs']);
        }
//        dd($data);
        if (!isset($data['description'])) {
            unset($data['description']);
        }
//        dd($data);
        if (!isset($data['appointment'])) {
            unset($data['appointment']);
        }
//        dd($data);
        if (isset($data['sort'])) {
            $data['sort'] = [
                $data['sort'],
                $data['order']
            ];
            unset($data['order']);
        }
//        dd($data);

        $filter = app()->make(FertilizerFilter::class, [
            'queryParams' => array_filter($data)
        ]);
//        dd($filter);

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

        $fertilizers = Fertilizer::filter($filter)->get();
//        dd($fertilizers);
        return view('admin.fertilizer.searchget',
            compact('fertilizers', 'cultures', 'districts', 'costs'));
    }
}
