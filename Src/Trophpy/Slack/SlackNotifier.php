<?php
declare(strict_types=1);

namespace Trophpy\Slack;

use App\Jobs\SendSlackMessage;
use Maknz\Slack\Attachment;
use Maknz\Slack\Client;
use Maknz\Slack\Message as SlackMessage;

final class SlackNotifier
{

    /** @var Message */
    private $message;

    private function __construct(Message $message = null)
    {
        $settings = config('slack.client.settings');

        if (empty($message)) {
            $message = new Message();

            $message->setUsername($settings['username']);
            $message->setChannel($settings['channel']);
        }

        $this->message = $message;
    }

    public static function new(): self
    {
        return new static();
    }

    public static function newFromQueue(Message $message): self
    {
        return new static($message);
    }

    public function from(string $username): self
    {
        $this->message->setUsername($username);

        return $this;
    }

    public function to(string $channel): self
    {
        $this->message->setChannel($channel);

        return $this;
    }

    public function attach(Attachment $attachment): self
    {
        $this->message->attach($attachment);

        return $this;
    }

    public function text(string $text): self
    {
        $this->message->setText($text);

        return $this;
    }

    public function dispatch(Client $client = null)
    {
        if (empty($client)) {
            $client = $this->createSlackClient();
        }

        $slackMessage = $this->createSlackMessage($client);

        $client->sendMessage($slackMessage);
    }

    private function createSlackClient(): Client
    {
        return new Client(config('slack.client.endpoint'));
    }

    private function createSlackMessage(Client $client): SlackMessage
    {
        $message = new SlackMessage($client);

        $message->setChannel($this->message->getChannel());
        $message->setUsername($this->message->getUsername());
        $message->setText($this->message->getText());
        $message->setAttachments($this->message->getAttachments());

        return $message;
    }

    public function queue()
    {
        dispatch(new SendSlackMessage($this->getMessage()));
    }

    public function getMessage(): Message
    {
        return $this->message;
    }
}