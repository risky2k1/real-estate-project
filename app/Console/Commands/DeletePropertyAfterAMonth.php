<?php

namespace App\Console\Commands;

use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeletePropertyAfterAMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'property:delete-property-after-a-month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'xóa bài đăng sau 1 tháng';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentDate = Carbon::now();
        $expiredProperties = Property::where('created_at', '<', $currentDate->subDay())->get();

        foreach ($expiredProperties as $property){
            $property->delete();
        }

        $this->info('Cập nhật thành công');
    }
}
