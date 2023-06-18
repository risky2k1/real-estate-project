<?php

namespace App\Console\Commands;

use App\Enums\PropertyStatus;
use App\Models\Property;
use Illuminate\Console\Command;

class CheckPropertyStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'property:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Đổi cái trạng thái Feature về bình thường sau 1 ngày';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $properties = Property::all();
        foreach ($properties as $property){
            if ($property->property_status = PropertyStatus::Featured){
                $property->update([
                   'property_status'=>PropertyStatus::getRandomValue(),
                ]);
            }
        }
    }
}
