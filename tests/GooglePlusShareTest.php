<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class GooglePlusShareTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link()
    {
        $result = ShareFacade::page('https://codeswitch.be')->googlePlus();
        $expected = '<div id="social-links"><ul><li><a href="https://plus.google.com/share?url=https://codeswitch.be" class="social-button " id=""><span class="fa fa-google-plus"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be')->googlePlus();
        $expected = '<div id="social-links"><ul><li><a href="https://plus.google.com/share?url=https://codeswitch.be" class="social-button " id=""><span class="fab fa-google-plus-g"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_a_custom_class()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class'])
            ->googlePlus();
        $expected = '<div id="social-links"><ul><li><a href="https://plus.google.com/share?url=https://codeswitch.be" class="social-button my-class" id=""><span class="fa fa-google-plus"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_a_custom_class_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class'])
            ->googlePlus();
        $expected = '<div id="social-links"><ul><li><a href="https://plus.google.com/share?url=https://codeswitch.be" class="social-button my-class" id=""><span class="fab fa-google-plus-g"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_a_custom_class_and_custom_id()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class', 'id' => 'my-id'])
            ->googlePlus();
        $expected = '<div id="social-links"><ul><li><a href="https://plus.google.com/share?url=https://codeswitch.be" class="social-button my-class" id="my-id"><span class="fa fa-google-plus"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_a_custom_class_and_custom_id_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class', 'id' => 'my-id'])
            ->googlePlus();
        $expected = '<div id="social-links"><ul><li><a href="https://plus.google.com/share?url=https://codeswitch.be" class="social-button my-class" id="my-id"><span class="fab fa-google-plus-g"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_custom_prefix_and_suffix()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, [], '<ul>', '</ul>')
            ->googlePlus();
        $expected = '<ul><li><a href="https://plus.google.com/share?url=https://codeswitch.be" class="social-button " id=""><span class="fa fa-google-plus"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_custom_prefix_and_suffix_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', null, [], '<ul>', '</ul>')
            ->googlePlus();
        $expected = '<ul><li><a href="https://plus.google.com/share?url=https://codeswitch.be" class="social-button " id=""><span class="fab fa-google-plus-g"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_all_extra_options()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class my-class2', 'id' => 'gp-share'], '<ul>', '</ul>')
            ->googlePlus();
        $expected = '<ul><li><a href="https://plus.google.com/share?url=https://codeswitch.be" class="social-button my-class my-class2" id="gp-share"><span class="fa fa-google-plus"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_all_extra_options_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class my-class2', 'id' => 'gp-share'], '<ul>', '</ul>')
            ->googlePlus();
        $expected = '<ul><li><a href="https://plus.google.com/share?url=https://codeswitch.be" class="social-button my-class my-class2" id="gp-share"><span class="fab fa-google-plus-g"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }
}