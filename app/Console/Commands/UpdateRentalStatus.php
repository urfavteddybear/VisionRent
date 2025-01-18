<?php

namespace App\Console\Commands;

use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateRentalStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-rental-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all rentals that start today
        $today = Carbon::today();

        // Start transaction to ensure data consistency
        DB::transaction(function () use ($today) {
            // Handle rentals starting today
            Rental::where('start_date', $today)
                  ->where('status', 'scheduled')
                  ->each(function ($rental) {
                      $rental->item->decrement('stock');
                      $rental->update(['status' => 'rented']);
                  });
        });
    }
}
