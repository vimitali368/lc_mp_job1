<?php

namespace App\Jobs;

use App\Http\Controllers\Admin\Status\StoreController;
use App\Imports\FertilizersImport;
use App\Models\ImportStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class StoreFertilizerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $filePath;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath)
    {
        //
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            ini_set('memory_limit', '-1');
            Excel::import(new FertilizersImport(), $this->filePath);
            // Create a new collection for our example
            $collection = new Collection([
                ['file' => $this->filePath],
            ]);
//            dd($collection);
            // Convert the above collection to JSON format
            $jsonValue = $collection->toJson();
//            dd($jsonValue);
//            TODO: auth()->user()->id
            $data = [
                'status' => 1,
                'user_id' => 1,
                'jsonb' => $jsonValue,
            ];
//            dd($data);
            ImportStatus::сreate($data);
//            return route('admin.status.store', compact('data'));
        } catch (\Exception $exception) {
            $collection = new Collection([
                ['file' => $this->filePath],
            ]);
            //            TODO: auth()->user()->id
            $data = [
                'status' => 2,
                'user_id' => 1,
                'jsonb' => json_encode($exception)
            ];
//            dd($data);
            ImportStatus::сreate($data);
//            return route('admin.status.store', compact('data'));
        }
//        public_path('excel/' . 'Fertilizers.xlsx'));

//        dd('finish');
    }
}
