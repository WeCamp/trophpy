<?php
declare(strict_types=1);

namespace Tests\Unit;

use Maknz\Slack\Client;
use Mockery;
use Tests\TestCase;
use Trophpy\Slack\SlackNotifier;

final class SlockNotifierTest extends TestCase
{

    /** @test */
    public function username_is_initialized_by_default()
    {
        $instance = SlackNotifier::new();

        $message = $instance->getMessage();

        $this->assertEquals(config('slack.client.settings.username'), $message->getUsername());
    }

    /** @test */
    public function channel_is_initialized_by_default()
    {
        $notifier = SlackNotifier::new();

        $message = $notifier->getMessage();

        $this->assertEquals(config('slack.client.settings.channel'), $message->getChannel());
    }

    public function a_custom_channel_can_be_set()
    {
        $notifier = SlackNotifier::new();

        $notifier->to('#my_custom_channel');

        $message = $notifier->getMessage();

        $this->assertEquals('#my_custom_channel', $message->getChannel());
    }

    /** @test */
    public function a_custom_username_can_be_set()
    {
        $notifier = SlackNotifier::new();

        $notifier->from('my_custom_username');

        $message = $notifier->getMessage();

        $this->assertEquals('my_custom_username', $message->getUsername());
    }

    /** @test */
    public function text_can_be_set()
    {
        $notifier = SlackNotifier::new();

        $notifier->text('my awesome text');

        $message = $notifier->getMessage();

        $this->assertEquals($message->getText(), 'my awesome text');
    }

    /** @test */
    public function dispatch_triggers_slack_send_message_method()
    {
        $client = Mockery::mock(Client::class);
        $client->shouldReceive('sendMessage')
               ->once()
        ;

        SlackNotifier::new($client)
                     ->dispatch()
        ;
    }
}
