<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class FontAwesomev6Test extends TestCase
{
    /**
     * @test
     */
    public function it_can_generate_a_facebook_fa6_share_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->facebook();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button " id="" title="" rel=""><span class="fa-brands fa-facebook-square"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_fa6_share_link()
    {
        $result = ShareFacade::page('https://codeswitch.be','Title')->linkedin('A summary can be passed here');
        $expected = '<div id="social-links"><ul><li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://codeswitch.be&title=Title&summary=A+summary+can+be+passed+here" class="social-button " id="" title="" rel=""><span class="fa-brands fa-linkedin"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_pinterest_fa6_share_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->pinterest();
        $expected = '<div id="social-links"><ul><li><a href="https://pinterest.com/pin/create/button/?url=https://codeswitch.be" class="social-button " id="" title="" rel=""><span class="fa-brands fa-pinterest"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_reddit_fa6_share_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->reddit();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://www.reddit.com/submit?title=Default+share+text&url=https://codeswitch.be" class="social-button " id="" title="" rel=""><span class="fa-brands fa-reddit"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_telegram_fa6_share_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->telegram();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=Default+share+text" class="social-button " id="" title="" rel=""><span class="fa-brands fa-telegram"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_twitter_fa6_share_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->twitter();
        $expected = '<div id="social-links"><ul><li><a href="https://twitter.com/intent/tweet?text=Default+share+text&url=https://codeswitch.be" class="social-button " id="" title="" rel=""><span class="fa-brands fa-twitter"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_fa6_share_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->whatsapp();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id="" title="" rel=""><span class="fa-brands fa-whatsapp"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }
}
