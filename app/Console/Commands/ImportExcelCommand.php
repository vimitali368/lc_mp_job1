<?php

namespace App\Console\Commands;

use App\Imports\FertilizersImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{
    protected $signature = 'import:excel';

    protected $description = 'Get data from Excel';

    public function handle()
    {
        ini_set('memory_limit', '-1');
        Excel::import(new FertilizersImport(), public_path('excel/' . '01_Fertilizers.xlsx'));

        dd('finish');
    }
}

