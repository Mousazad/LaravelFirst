<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SumTwoInteger implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
	private int $a;
	private int $b;
    public function __construct(int $x , int $y)
    {
        $this->a=$x;
		$this->b=$y;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $s = $this->a + $this->b;
		error_log('sum = '.$s);
    }
}
