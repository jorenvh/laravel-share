<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class LinkedinShareTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', 'Title')->linkedin('A summary can be passed here');
        $expected = '<div id="social-links"><ul><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http://jorenvanhocht.be&title=Title&summary=A summary can be passed here" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link_without_summary()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', 'Title')->linkedin();
        $expected = '<div id="social-links"><ul><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http://jorenvanhocht.be&title=Title&summary=" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link_with_a_custom_class()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', 'Title', ['class' => 'my-class'])
            ->linkedin('A summary can be passed here');
        $expected = '<div id="social-links"><ul><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http://jorenvanhocht.be&title=Title&summary=A summary can be passed here" class="social-button my-class" id=""><span class="fa fa-linkedin"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link_with_a_custom_class_and_custom_id()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', 'Title', ['class' => 'my-class', 'id' => 'my-id'])
            ->linkedin('A summary can be passed here');
        $expected = '<div id="social-links"><ul><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http://jorenvanhocht.be&title=Title&summary=A summary can be passed here" class="social-button my-class" id="my-id"><span class="fa fa-linkedin"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link_with_custom_prefix_and_suffix()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', 'Title', [], '<ul>', '</ul>')
            ->linkedin('A summary can be passed here');
        $expected = '<ul><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http://jorenvanhocht.be&title=Title&summary=A summary can be passed here" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link_with_all_extra_options()
    {
        $result = ShareFacade::page('http://jorenvanhocht.be', 'Title', ['class' => 'my-class my-class2', 'id' => 'linkedin-share'], '<ul>', '</ul>')
            ->linkedin('A summary can be passed here');
        $expected = '<ul><li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http://jorenvanhocht.be&title=Title&summary=A summary can be passed here" class="social-button my-class my-class2" id="linkedin-share"><span class="fa fa-linkedin"></span></a></li></ul>';

        $this->assertEquals($expected, $result);
    }
}