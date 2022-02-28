<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ClientsExport implements FromView, ShouldAutoSize, WithStyles
{
    public $indexes;

    /**
     * IndexExport constructor.
     * @param $indexes
     */
    public function __construct($indexes)
    {
        $this->indexes = $indexes;
    }

    public function view(): View
    {
        return view('export.client.index', [
            'indexes' => $this->indexes
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
