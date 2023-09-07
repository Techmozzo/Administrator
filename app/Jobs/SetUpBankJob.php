<?php

namespace App\Jobs;

use App\Models\Banker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SetUpBankJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Banker::updateOrCreate([
            'email' => 'admin@ea.com',
            'first_name' => 'Admin',
            'last_name' => 'T.',
            'is_verified' => 1,
            'phone' => '08134822658'
        ], ['password' => bcrypt('123456')]);
    }
}
