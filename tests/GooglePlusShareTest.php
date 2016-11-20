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
        $result = ShareFacade::page('http://jorenvanhocht.be')->googlePlus();
        $expected = '<div id="social-links"><ul><li><a href="https://plus.google.com/share?url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-google-plus"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_a_custom_class()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', null, ['class' => 'my-class'])
            ->googlePlus();
        $expected = '<div id="social-links"><ul><li><a href="https://plus.google.com/share?url=http://jorenvanhocht.be" class="social-button my-class" id=""><span class="fa fa-google-plus"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_a_custom_class_and_custom_id()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', null, ['class' => 'my-class', 'id' => 'my-id'])
            ->googlePlus();
        $expected = '<div id="social-links"><ul><li><a href="https://plus.google.com/share?url=http://jorenvanhocht.be" class="social-button my-class" id="my-id"><span class="fa fa-google-plus"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_custom_prefix_and_suffix()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', null, [], '<ul>', '</ul>')
            ->googlePlus();
        $expected = '<ul><li><a href="https://plus.google.com/share?url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-google-plus"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_google_plus_share_link_with_all_extra_options()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', null, ['class' => 'my-class my-class2', 'id' => 'gp-share'], '<ul>', '</ul>')
            ->googlePlus();
        $expected = '<ul><li><a href="https://plus.google.com/share?url=http://jorenvanhocht.be" class="social-button my-class my-class2" id="gp-share"><span class="fa fa-google-plus"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }
}