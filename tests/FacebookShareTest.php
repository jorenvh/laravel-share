<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class FacebookShareTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->facebook();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-facebook-official"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be')->facebook();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-facebook-square"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_a_custom_class()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class'])
            ->facebook();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button my-class" id="" title=""><span class="fa fa-facebook-official"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_a_custom_class_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class'])
            ->facebook();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button my-class" id="" title=""><span class="fab fa-facebook-square"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_a_custom_class_and_custom_id()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class', 'id' => 'my-id'])
            ->facebook();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fa fa-facebook-official"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_a_custom_class_and_custom_id_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class', 'id' => 'my-id'])
            ->facebook();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button my-class" id="my-id" title=""><span class="fab fa-facebook-square"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_custom_prefix_and_suffix()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, [], '<ul>', '</ul>')
            ->facebook();
        $expected = '<ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button " id="" title=""><span class="fa fa-facebook-official"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_custom_prefix_and_suffix_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', null, [], '<ul>', '</ul>')
            ->facebook();
        $expected = '<ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button " id="" title=""><span class="fab fa-facebook-square"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_all_extra_options()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'title that is not used for fb', ['class' => 'my-class my-class2', 'id' => 'fb-share', 'title' => 'My Title for SEO'], '<ul>', '</ul>')
            ->facebook();
        $expected = '<ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button my-class my-class2" id="fb-share" title="My Title for SEO"><span class="fa fa-facebook-official"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_all_extra_options_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', 'title that is not used for fb', ['class' => 'my-class my-class2', 'id' => 'fb-share', 'title' => 'My Title for SEO'], '<ul>', '</ul>')
            ->facebook();
        $expected = '<ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://codeswitch.be" class="social-button my-class my-class2" id="fb-share" title="My Title for SEO"><span class="fab fa-facebook-square"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }
}
