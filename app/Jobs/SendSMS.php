<?php

namespace App\Jobs;

use AndroidSmsGateway\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use AndroidSmsGateway\Domain\Message;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

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
        try {
            $client = new Client(env('SMS_USER'), env('SMS_PASS'));
            $message = new Message($this->content, [('+258' . $this->to)]);
            
            Log::info('Sending SMS to: ' . $this->to . ' with message: ' . $this->content);
            
            $messageState = $client->Send($message);
            Log::info("Message sent with ID: " . $messageState->ID());
        } catch (\Exception $e) {
            Log::error('Error sending message: ' . $e->getMessage());
            echo "Error sending message: " . $e->getMessage() . PHP_EOL;
            die(1);
        }
    
        try {
            $messageState = $client->GetState($messageState->ID());
            Log::info("Message state: " . $messageState->State());
        } catch (\Exception $e) {
            Log::error('Error getting message state: ' . $e->getMessage());
            echo "Error getting message state: " . $e->getMessage() . PHP_EOL;
            die(1);
        }
    }
}
