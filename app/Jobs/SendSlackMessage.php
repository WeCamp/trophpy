<?php
declare(strict_types=1);

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Trophpy\Slack\Message;
use Trophpy\Slack\SlackNotifier;

final class SendSlackMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var array */
    private $message;

    /**
     * Create a new job instance.
     *
     * @param array $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        SlackNotifier::newFromQueue($this->message)
            ->dispatch();
    }
}
