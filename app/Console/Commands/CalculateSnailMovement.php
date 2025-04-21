<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CalculateSnailMovement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:calculate-snail-movement';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate snail movement to come out from a well';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $well_depth = 11;
        $climb_rate = 3;
        $slide_rate = 2;
        $current_height = 0;
        $days = 0;

        while ($current_height < $well_depth) {
            $days++;

            $current_height += $climb_rate;

            if ($current_height >= $well_depth) {
                break;
            }

            $current_height -= $slide_rate;
        }

        $this->info("the snail will need {$days} days to climb out of the {$well_depth} meters well");
    }
}
