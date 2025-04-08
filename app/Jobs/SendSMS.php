<?php

namespace App\Jobs;

use App\Support\SMS;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $to, public string $content)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        SMS::send($this->to, $this->content);
    }
}
