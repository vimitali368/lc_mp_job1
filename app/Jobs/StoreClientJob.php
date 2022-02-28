<?php

namespace App\Jobs;

use App\Http\Controllers\Admin\Status\StoreController;
use App\Imports\ClientsImport;
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

class StoreClientJob implements ShouldQueue
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
            Excel::import(new ClientsImport(), $this->filePath);
//             Create a new collection for our example
            $collection = new Collection([
                ['file' => $this->filePath],
            ]);
//            dd($collection);
            // Convert the above collection to JSON format
            $jsonValue = $collection->toJson();
//            dd($jsonValue);
            $data = [
                'status' => 1,
                'user_id' => auth()->user()->id,
                'jsonb' => $jsonValue,
            ];
//            dd($data);
            return route('admin.status.store', compact('data'));
        } catch (\Exception $exception) {
            $collection = new Collection([
                ['file' => $this->filePath],
            ]);
            $data = [
                'status' => 2,
                'user_id' => auth()->user()->id,
                'jsonb' => json_encode($exception->errors)
            ];
            dd($data);
            return route('admin.status.store', compact('data'));
        }
//        public_path('excel/' . 'Clients.xlsx'));

//        dd('finish');
    }
}
