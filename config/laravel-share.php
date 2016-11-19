<?php

return [
    'services' => [
        'facebook' => [
            'uri' => 'https://www.facebook.com/sharer/sharer.php?u=',
        ],
        'twitter' => [
            'uri' => 'https://twitter.com/intent/tweet',
            'text' => 'Default share text'
        ],
        'gplus' => [
            'uri' => 'https://plus.google.com/share?url=',
        ],
        'linkedin' => [
            'uri' => 'http://www.linkedin.com/shareArticle',
            'extra' => ['mini' => 'true']
        ],
    ],
];
