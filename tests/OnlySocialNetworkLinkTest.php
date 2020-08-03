<?php


namespace Jorenvh\Share\Test;


use Jorenvh\Share\ShareFacade;

class OnlySocialNetworkLinkTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_return_only_facebook_built_link()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')->facebook()->onlyLink();
        $expected = 'https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_return_only_twitter_built_link()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')->twitter()->onlyLink();
        $expected = 'https://twitter.com/intent/tweet?text=My+share+title&url=https://codeswitch.be';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_return_only_linkedin_built_link()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')->linkedin()->onlyLink();
        $expected = 'http://www.linkedin.com/shareArticle?mini=true&url=https://codeswitch.be&title=My+share+title&summary=';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_return_only_whatsapp_built_link()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')->whatsapp()->onlyLink();
        $expected = 'https://wa.me/?text=https://codeswitch.be';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_return_only_pinterest_built_link()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')->pinterest()->onlyLink();
        $expected = 'http://pinterest.com/pin/create/button/?url=https://codeswitch.be';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_return_only_reddit_built_link()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')->reddit()->onlyLink();
        $expected = 'https://www.reddit.com/submit?title=My+share+title&url=https://codeswitch.be';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_return_only_telegram_built_link()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')->telegram()->onlyLink();
        $expected = 'https://telegram.me/share/url?url=https://codeswitch.be&text=My+share+title';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
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
            ->onlyLink();

        $expected = [
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be',
            'twitter' => 'https://twitter.com/intent/tweet?text=My+share+title&url=https://codeswitch.be',
            'linkedin' => 'http://www.linkedin.com/shareArticle?mini=true&url=https://codeswitch.be&title=My+share+title&summary=',
            'whatsapp' => 'https://wa.me/?text=https://codeswitch.be',
            'pinterest' => 'http://pinterest.com/pin/create/button/?url=https://codeswitch.be',
            'reddit' => 'https://www.reddit.com/submit?title=My+share+title&url=https://codeswitch.be',
            'telegram' => 'https://telegram.me/share/url?url=https://codeswitch.be&text=My+share+title',
        ];
        $this->assertEquals($expected, $result);
    }
}
