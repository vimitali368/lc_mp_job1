<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\ExcelRequest;
use App\Jobs\StoreCultureJob;
use Illuminate\Support\Facades\Storage;

class ExcelController extends Controller
{
    public function __invoke(ExcelRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        $data['excel_input_file'] = Storage::put('/docs/excel/in', $data['excel_input_file']);
        StoreCultureJob::dispatch(Storage::path($data['excel_input_file']));
        $outMessage = 'Данные импортируются';
        return back()->withStatus($outMessage);
//        ->withErrors()->with('success', $outMessage);
//        return redirect()->back()->with('success', $outMessage);
//        return redirect()->route('admin.culture.index');
    }
}
