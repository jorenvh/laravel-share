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

    /** @test */
    public function it_can_return_only_facebook_built_link()
    {
        $expected = ['facebook' => 'https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be'];
        $result = ShareFacade::page('https://codeswitch.be', 'My facebook title')
            ->facebook()
            ->getRawLinks();

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function it_can_return_only_twitter_built_link()
    {
        $expected = ['twitter' => 'https://twitter.com/intent/tweet?text=My+twitter+title&url=https://codeswitch.be'];
        $result = ShareFacade::page('https://codeswitch.be', 'My twitter title')
            ->twitter()
            ->getRawLinks();

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function it_can_return_only_linkedin_built_link()
    {
        $expected = ['linkedin' => 'https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://codeswitch.be&title=My+linkedin+title&summary='];
        $result = ShareFacade::page('https://codeswitch.be', 'My linkedin title')
            ->linkedin()
            ->getRawLinks();

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function it_can_return_only_whatsapp_built_link()
    {
        $expected = ['whatsapp' => 'https://wa.me/?text=https://codeswitch.be'];
        $result = ShareFacade::page('https://codeswitch.be', 'My whatsapp title')
            ->whatsapp()
            ->getRawLinks();

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function it_can_return_only_pinterest_built_link()
    {
        $expected = ['pinterest' => 'https://pinterest.com/pin/create/button/?url=https://codeswitch.be'];
        $result = ShareFacade::page('https://codeswitch.be', 'My pinterest title')
            ->pinterest()
            ->getRawLinks();

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function it_can_return_only_reddit_built_link()
    {
        $expected = ['reddit' => 'https://www.reddit.com/submit?title=My+reddit+title&url=https://codeswitch.be'];
        $result = ShareFacade::page('https://codeswitch.be', 'My reddit title')
            ->reddit()
            ->getRawLinks();

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function it_can_return_only_telegram_built_link()
    {
        $expected = ['telegram' => 'https://telegram.me/share/url?url=https://codeswitch.be&text=My+telegram+title'];
        $result = ShareFacade::page('https://codeswitch.be', 'My telegram title')
            ->telegram()
            ->getRawLinks();

        $this->assertEquals($expected, $result);
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
