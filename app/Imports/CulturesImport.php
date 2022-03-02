<?php

namespace App\Imports;

use App\Http\Controllers\Admin\Status\StoreController;
use App\Models\Culture;
use App\Models\ImportStatus;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class CulturesImport implements
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
                Culture::firstOrCreate([
                    'name' => $item['naimenovanie'],
                ], [
                    'name' => $item['naimenovanie'],
                ]);
            }
        }
    }

    public function rules(): array
    {
        return [
            'naimenovanie' => 'required|string',
        ];
    }

    public function onFailure(Failure ...$failures)
    {
//        foreach ($failures as $failure) {
////            dd($failure);
//        }

        $data = [
            'status' => 2,
            'user_id' => 1,
            'jsonb' => json_encode($failures),
        ];
//        StoreController::class($data);
//        $invokableObj = new StoreController();
//        $invokableObj = new StoreController();
//        $invokableObj->__invoke($data);

//        dd($data);
        ImportStatus::сreate($data);
//        return route('admin.status.store', compact('data'));
    }
}
