<?php

namespace App\Jobs;


use App\Imports\CulturesImport;
use App\Models\ImportStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class StoreCultureJob implements ShouldQueue
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
            Excel::import(new CulturesImport(), $this->filePath);
            // Create a new collection for our example
//            dd($collection);
            // Convert the above collection to JSON format
//                ['uuid' => $this->filePath],
//            $jsonValue = collect([
//                ['file' => $this->filePath],
//            ])->toJson();
//            dd($jsonValue);
//            $data = [
//                'status' => 1,
//                'user_id' => auth()->user()->id,
//                'jsonb' => $jsonValue,
//            ];
//            dd($data);
//TODO: 'user_id' => auth()->user()->id
//TODO: 'jsonb' => filename
//
            $data = [
                'status' => 1,
                'user_id' => 1,
//                'jsonb' => '1',
            ];
//        dd($data);
            ImportStatus::create($data);
//            return route('admin.status.store', compact('data'));
        } catch (\Exception $exception) {
//            dd($exception);
            $data = [
                'status' => 2,
                'user_id' => 1,
                'jsonb' => json_encode($exception),
            ];
//        dd($data);
            ImportStatus::create($data);

            //            $collection = new Collection([
//                ['file' => $this->filePath],
//            ]);
//                'jsonb' => json_encode($exception->errors)
//            ];
//            dd($data);
//            return route('admin.status.store', compact('data'));
        }
    }
}
