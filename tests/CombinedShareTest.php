<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class CombinedShareTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_generate_generate_multiple_share_links_at_once()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->pinterest()
            ->reddit()
            ->telegram();

        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-facebook-official"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My+share+title&url=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-twitter"></span></a></li><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=https://codeswitch.be&title=My+share+title&summary=" class="social-button " id="" title=""><span class="fa fa-linkedin"></span></a></li><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-whatsapp"></span></a></li><li><a href="http://pinterest.com/pin/create/button/?url=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-pinterest"></span></a></li><li><a target="_blank" href="https://www.reddit.com/submit?title=My+share+title&url=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-reddit"></span></a></li><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=My+share+title" class="social-button " id="" title=""><span class="fa fa-telegram"></span></a></li></ul></div>';
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_generate_multiple_share_links_at_once_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->pinterest()
            ->reddit()
            ->telegram();

        $expected ='<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-facebook-square"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My+share+title&url=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-twitter"></span></a></li><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=https://codeswitch.be&title=My+share+title&summary=" class="social-button " id="" title=""><span class="fab fa-linkedin"></span></a></li><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-whatsapp"></span></a></li><li><a href="http://pinterest.com/pin/create/button/?url=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-pinterest"></span></a></li><li><a target="_blank" href="https://www.reddit.com/submit?title=My+share+title&url=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-reddit"></span></a></li><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=My+share+title" class="social-button " id="" title=""><span class="fab fa-telegram"></span></a></li></ul></div>';
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_multiple_share_links_at_once_and_multiple_times_after_each_other()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->pinterest()
            ->reddit()
            ->telegram();

        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-facebook-official"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My+share+title&url=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-twitter"></span></a></li><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=https://codeswitch.be&title=My+share+title&summary=" class="social-button " id="" title=""><span class="fa fa-linkedin"></span></a></li><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-whatsapp"></span></a></li><li><a href="http://pinterest.com/pin/create/button/?url=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-pinterest"></span></a></li><li><a target="_blank" href="https://www.reddit.com/submit?title=My+share+title&url=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-reddit"></span></a></li><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=My+share+title" class="social-button " id="" title=""><span class="fa fa-telegram"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);

        $result = ShareFacade::page('https://codeswitch.be', 'My share title')
            ->facebook()
            ->twitter();

        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-facebook-official"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My+share+title&url=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-twitter"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_multiple_share_links_at_once_and_multiple_times_after_each_other_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', 'My share title')
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->pinterest()
            ->reddit()
            ->telegram();

        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-facebook-square"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My+share+title&url=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-twitter"></span></a></li><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=https://codeswitch.be&title=My+share+title&summary=" class="social-button " id="" title=""><span class="fab fa-linkedin"></span></a></li><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-whatsapp"></span></a></li><li><a href="http://pinterest.com/pin/create/button/?url=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-pinterest"></span></a></li><li><a target="_blank" href="https://www.reddit.com/submit?title=My+share+title&url=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-reddit"></span></a></li><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=My+share+title" class="social-button " id="" title=""><span class="fab fa-telegram"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);

        $result = ShareFacade::page('https://codeswitch.be', 'My share title')
            ->facebook()
            ->twitter();

        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-facebook-square"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My+share+title&url=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-twitter"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_generate_multiple_share_links_at_once_with_extra_options()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'My share title', ['class' => 'my-class', 'id' => 'my-id'], '<ul>', '</ul>')
            ->facebook()
            ->twitter()
            ->whatsapp()
            ->pinterest()
            ->reddit()
            ->telegram();

        $expected = '<ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fa fa-facebook-official"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My+share+title&url=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fa fa-twitter"></span></a></li><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fa fa-whatsapp"></span></a></li><li><a href="http://pinterest.com/pin/create/button/?url=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fa fa-pinterest"></span></a></li><li><a target="_blank" href="https://www.reddit.com/submit?title=My+share+title&url=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fa fa-reddit"></span></a></li><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=My+share+title" class="social-button my-class" id="my-id" title=""><span class="fa fa-telegram"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_generate_multiple_share_links_at_once_with_extra_options_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', 'My share title', ['class' => 'my-class', 'id' => 'my-id'], '<ul>', '</ul>')
            ->facebook()
            ->twitter()
            ->whatsapp()
            ->pinterest()
            ->reddit()
            ->telegram();

        $expected = '<ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fab fa-facebook-square"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My+share+title&url=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fab fa-twitter"></span></a></li><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fab fa-whatsapp"></span></a></li><li><a href="http://pinterest.com/pin/create/button/?url=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fab fa-pinterest"></span></a></li><li><a target="_blank" href="https://www.reddit.com/submit?title=My+share+title&url=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fab fa-reddit"></span></a></li><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=My+share+title" class="social-button my-class" id="my-id" title=""><span class="fab fa-telegram"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }
}
