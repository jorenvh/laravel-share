<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class RawLinksTest extends TestCase
{
    /** @test */
    public function it_can_return_empty_array_with_no_links()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')
            ->getRawLinks();

        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    /** @test */
    public function it_can_return_one_link_as_array()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')
            ->facebook()
            ->getRawLinks();

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * @test
     * @dataProvider provide_data_for_only_link
     */
    public function it_can_return_only_facebook_built_link($provider, $url, $title, $expected)
    {
        $result = ShareFacade::page($url, $title)
            ->$provider()
            ->getRawLinks();

        $this->assertEquals($expected, $result);
    }

    /**
     * @return array[]
     */
    public function provide_data_for_only_link(): array
    {
        return [
            'facebook' => [
                'facebook',
                'https://codeswitch.be',
                'My facebook title',
                ['facebook' => 'https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be'],
            ],
            'twitter' => [
                'twitter',
                'https://codeswitch.be',
                'My twitter title',
                ['twitter' => 'https://twitter.com/intent/tweet?text=My+twitter+title&url=https://codeswitch.be'],
            ],
            'linkedin' => [
                'linkedin',
                'https://codeswitch.be',
                'My linkedin title',
                ['linkedin' => 'https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://codeswitch.be&title=My+linkedin+title&summary='],
            ],
            'whatsapp' => [
                'whatsapp',
                'https://codeswitch.be',
                'My whatsapp title',
                ['whatsapp' => 'https://wa.me/?text=https://codeswitch.be'],
            ],
            'pinterest' => [
                'pinterest',
                'https://codeswitch.be',
                'My pinterest title',
                ['pinterest' => 'https://pinterest.com/pin/create/button/?url=https://codeswitch.be'],
            ],
            'reddit' => [
                'reddit',
                'https://codeswitch.be',
                'My reddit title',
                ['reddit' => 'https://www.reddit.com/submit?title=My+reddit+title&url=https://codeswitch.be'],
            ],
            'telegram' => [
                'telegram',
                'https://codeswitch.be',
                'My telegram title',
                ['telegram' => 'https://telegram.me/share/url?url=https://codeswitch.be&text=My+telegram+title'],
            ],
        ];
    }

    /** @test */
    public function it_can_return_multiple_built_links_at_once()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->pinterest()
            ->reddit()
            ->telegram()
            ->getRawLinks();

        $expected = [
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be',
            'twitter' => 'https://twitter.com/intent/tweet?text=My+share+title&url=https://codeswitch.be',
            'linkedin' => 'https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://codeswitch.be&title=My+share+title&summary=',
            'whatsapp' => 'https://wa.me/?text=https://codeswitch.be',
            'pinterest' => 'https://pinterest.com/pin/create/button/?url=https://codeswitch.be',
            'reddit' => 'https://www.reddit.com/submit?title=My+share+title&url=https://codeswitch.be',
            'telegram' => 'https://telegram.me/share/url?url=https://codeswitch.be&text=My+share+title',
        ];

        $this->assertEquals($expected, $result);
    }
}
