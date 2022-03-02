<?php

namespace App\Imports;

use App\Models\Fertilizer;
use App\Models\ImportStatus;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class FertilizersImport implements
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
//            dd($item);
            if (isset($item['naimenovanie']) && $item['naimenovanie'] != null) {
                Fertilizer::firstOrCreate([
                    'name' => $item['naimenovanie'],
                ], [
                    'name' => $item['naimenovanie'],
                    'norm_nitrogen' => $item['norma_azot'],
                    'norm_phosphorus' => $item['norma_fosfor'],
                    'norm_potassium' => $item['norma_kalii'],
                    'culture_id' => $item['kultura_id'],
                    'district' => $item['raion'],
                    'cost' => $item['stoimost'],
                    'description' => $item['opisanie'],
                    'appointment' => $item['naznacenie']
                ]);
            }
        }
    }

    public function rules(): array
    {
        return [
            'naimenovanie' => 'required|string',
            'norma_azot' => 'required|numeric',
            'norma_fosfor' => 'required|numeric',
            'norma_kalii' => 'required|numeric',
            'kultura_id' => 'required|numeric|exists:cultures,id',
            'raion' => 'required|string',
            'stoimost' => 'required|numeric',
            'opisanie' => 'required|string',
            'naznacenie' => 'required|string'
        ];
    }

    public function onFailure(Failure ...$failures)
    {
//        foreach ($failures as $failure) {
////            dd($failure);
//        }

        // TODO: auth()->user()->id
        $data = [
            'status' => 2,
            'user_id' => 1,
            'jsonb' => json_encode($failures),
        ];
//        dd($data);
        ImportStatus::Create($data);
    }
}
