<?php

namespace App\Console\Commands;

use App\Imports\ClientsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelClientsCommand extends Command
{
    protected $signature = 'import:excel:clients';

    protected $description = 'Get clients from Excel';

    public function handle()
    {
        ini_set('memory_limit', '-1');
        Excel::import(new ClientsImport(), Storage::path('excel/' . 'Clients.xls'));
//        public_path('excel/' . 'Clients.xlsx'));

        dd('finish');
    }
}

