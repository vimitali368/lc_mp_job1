<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class WordController extends Controller
{
    public function __invoke(Client $client)
    {
        $phpWord = new PhpWord();

        $section = $phpWord->addSection();

        $section->addText(
            'Справка',
            [
                'size' => 18, 'color' => '#000', 'bold' => true
            ], [
            'alignment' => 'center'
        ]);

        $section->addTextBreak(1);

        $section->addText(
            'Подтверждает действительность заключение договора от ' . $client->contract_date . ' с компанией ' . $client->name .
            ' на сумму ' . $client->delivery_cost,
            [
                'size' => 13, 'color' => '#545454', 'italic' => true
            ], [
            'alignment' => 'both'
        ]);

        $section->addTextBreak(6);

        $section->addText(
            date('d-m-Y'),
        [
            'size' => 11, 'color' => '#00FF00'
        ],[
            'alignment' => 'left'
        ]);

        $section->addTextBreak(1);

        $section->addText(
            'С уважением, ИП Иванов. А. С.',
        [
            'size' => 12, 'color' => '#000', 'bold' => true
        ], [
            'alignment' => 'right'
        ]);

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $path = Storage::path('docs/contracts/client_' . $client->id . '_' . date('Y-m-d') . '.docx');
        $objWriter->save($path);
        return response()->download($path);
    }
}
