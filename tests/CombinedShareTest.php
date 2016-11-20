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
        $result = ShareFacade::page('http://jorenvanhocht.be', 'My share title')
            ->facebook()
            ->twitter()
            ->linkedin()
            ->googlePlus();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My share title&url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-twitter"></span></a></li><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http://jorenvanhocht.be&title=My share title&summary=" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li><li><a href="https://plus.google.com/share?url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-google-plus"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_multiple_share_links_at_once_and_multiple_times_after_eachother()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', 'My share title')
            ->facebook()
            ->twitter()
            ->linkedin()
            ->googlePlus();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My share title&url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-twitter"></span></a></li><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http://jorenvanhocht.be&title=My share title&summary=" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li><li><a href="https://plus.google.com/share?url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-google-plus"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);

        $result = ShareFacade::page('http://jorenvanhocht.be', 'My share title')
            ->facebook()
            ->twitter();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My share title&url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-twitter"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_generate_multiple_share_links_at_once_with_extra_options()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', 'My share title', ['class' => 'my-class', 'id' => 'my-id'], '<ul>', '</ul>')
            ->facebook()
            ->twitter();
        $expected = '<ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button my-class" id="my-id"><span class="fa fa-facebook-official"></span></a></li><li><a href="https://twitter.com/intent/tweet?text=My share title&url=http://jorenvanhocht.be" class="social-button my-class" id="my-id"><span class="fa fa-twitter"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }
}