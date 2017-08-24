<?php
declare(strict_types=1);

namespace Trophpy\Slack;

use Maknz\Slack\Attachment;
use Maknz\Slack\Client;
use Maknz\Slack\Message;

final class SlackNotifier
{

    /** @var \Maknz\Slack\Client */
    private $client;

    /** @var Message */
    private $message;

    private function __construct()
    {
        $settings = config('slack.client.settings');

        $this->client  = new Client(config('slack.client.endpoint'));
        $this->message = new Message($this->client);

        $this->message->setUsername($settings['username']);
        $this->message->setChannel($settings['channel']);
    }

    public static function new(): self
    {
        return self::createInstance();
    }

    private static function createInstance(): self
    {
        return new static();
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

    public function dispatch()
    {
        $this->message->send();
    }
}