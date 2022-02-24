<?php

namespace App\Console\Commands;

use App\Imports\FertilizersImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelFertilizersCommand extends Command
{
    protected $signature = 'import:excel:fertilizers';

    protected $description = 'Get fertilizers from Excel';

    public function handle()
    {
        ini_set('memory_limit', '-1');
        Excel::import(new FertilizersImport(), Storage::path('excel/' . 'Fertilizers.xlsx'));
//        public_path('excel/' . 'Fertilizers.xlsx'));

        dd('finish');
    }
}

