<?php

return [
    'client' => [
        'endpoint' => env('SLACK_WEBHOOK_ENDPOINT', "https://hooks.slack.com/services/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"),
        'settings' => [
            'username' => env('SLACK_USERNAME', 'Trophpy Event Notifier'),
            'channel'  => env('SLACK_CHANNEL','trophpy'),
            'link_names' => true,

        ]
    ]
];