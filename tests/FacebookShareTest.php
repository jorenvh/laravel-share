<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\Share;

class FacebookShareTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link()
    {
        $share = new Share();
        $result = $share->page('http://jorenvanhocht.be')->facebook();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_a_custom_class()
    {
        $share = new Share();
        $result = $share
            ->page('http://jorenvanhocht.be', null, ['class' => 'my-class'])
            ->facebook();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button my-class" id=""><span class="fa fa-facebook-official"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_a_custom_class_and_custom_id()
    {
        $share = new Share();
        $result = $share
            ->page('http://jorenvanhocht.be', null, ['class' => 'my-class', 'id' => 'my-id'])
            ->facebook();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button my-class" id="my-id"><span class="fa fa-facebook-official"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_custom_prefix_and_suffix()
    {
        $share = new Share();
        $result = $share
            ->page('http://jorenvanhocht.be', null, [], '<ul>', '</ul>')
            ->facebook();
        $expected = '<ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_all_extra_options()
    {
        $share = new Share();
        $result = $share
            ->page('http://jorenvanhocht.be', 'title that is not used for fb', ['class' => 'my-class my-class2', 'id' => 'fb-share'], '<ul>', '</ul>')
            ->facebook();
        $expected = '<ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button my-class my-class2" id="fb-share"><span class="fa fa-facebook-official"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }
}