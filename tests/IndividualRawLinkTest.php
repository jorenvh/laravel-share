<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class IndividualRawLinkTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_generate_a_facebook_raw_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->getRawLinks('facebook');
        $expected = 'https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_raw_link()
    {
        $result = ShareFacade::page('https://codeswitch.be','Title')->getRawLinks('linkedin');
        $expected = 'https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://codeswitch.be&title=Title&summary=';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_pinterest_raw_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->getRawLinks('pinterest');
        $expected = 'https://pinterest.com/pin/create/button/?url=https://codeswitch.be';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_reddit_raw_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->getRawLinks('reddit');
        $expected = 'https://www.reddit.com/submit?title=Default+share+text&url=https://codeswitch.be';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_telegram_raw_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->getRawLinks('telegram');
        $expected = 'https://telegram.me/share/url?url=https://codeswitch.be&text=Default+share+text';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_twitter_raw_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->getRawLinks('twitter');
        $expected = 'https://twitter.com/intent/tweet?text=Default+share+text&url=https://codeswitch.be';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_raw_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->getRawLinks('whatsapp');
        $expected = 'https://wa.me/?text=https://codeswitch.be';

        $this->assertEquals($expected, (string)$result);
    }
}