<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\ExcelRequest;
use App\Imports\ClientsImport;
use App\Models\Client;
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
        Excel::import(new ClientsImport(), Storage::path($data['excel_input_file']));
//        Artisan::call('import:excel', []);
//        Client::firstOrCreate($data);
        return redirect()->route('admin.client.index');
    }
}
