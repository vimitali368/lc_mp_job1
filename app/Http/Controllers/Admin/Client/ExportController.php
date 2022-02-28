<?php

namespace App\Http\Controllers\Admin\Client;

use App\Exports\ClientsExport;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function __invoke()
    {
        $indexes = Client::all();

        return Excel::download(new ClientsExport($indexes), 'clients.xlsx');
    }
}
