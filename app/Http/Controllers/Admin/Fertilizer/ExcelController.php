<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\ExcelRequest;
use App\Imports\FertilizersImport;
use App\Models\Fertilizer;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function __invoke(ExcelRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        $data['excel_input_file'] = Storage::put('/excel', $data['excel_input_file']);
//        dd($data['excel_input_file']);
//        ini_set('memory_limit', '-1');
        Excel::import(new FertilizersImport(), Storage::path($data['excel_input_file']));
//        Artisan::call('import:excel', []);
//        Fertilizer::firstOrCreate($data);
        return redirect()->route('admin.fertilizer.index');
    }
}
