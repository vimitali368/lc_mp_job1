<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\ImportStatus;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class ClientsImport implements
    ToCollection,
    WithHeadingRow,
    WithValidation,
    SkipsOnFailure
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

    public function rules(): array
    {
        return [
            'naimenovanie' => 'required|string',
            'data_dogovora' => 'required|date',
            'stoimost_postavki' => 'required|numeric',
            'region' => 'required|string',
        ];
    }

    public function onFailure(Failure ...$failures)
    {
//        foreach ($failures as $failure) {
////            dd($failure);
//        }
        // TODO: Implement onFailure() method.
        $data = [
            'status' => '2',
            'user_id' => auth()->user()->id,
            'jsonb' => json_encode($failures),
        ];
//        dd($data);
        ImportStatus::Create($data);
    }
}
