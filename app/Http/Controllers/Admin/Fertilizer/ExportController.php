<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Exports\FertilizersExport;
use App\Http\Controllers\Controller;
use App\Models\Fertilizer;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function __invoke()
    {
        $indexes = Fertilizer::all();

        return Excel::download(new FertilizersExport($indexes), 'fertilizers.xlsx');
    }
}
