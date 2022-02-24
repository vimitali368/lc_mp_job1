<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
//dd($item);
//            dd($item['data_dogovora']);
//            dd(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['data_dogovora'])->format('Y-m-d'));
            if (isset($item['naimenovanie']) && $item['naimenovanie'] != null) {
                Client::firstOrCreate([
                    'name' => $item['naimenovanie'],
                ], [
                    'name' => $item['naimenovanie'],
                    'contract_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['data_dogovora'])->format('Y-m-d'),
                    'delivery_cost' => $item['stoimost_postavki'],
                    'region' => $item['region'],
                ]);
            }
        }
    }
}
