<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class LinkedInShareTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Title')->linkedin('A summary can be passed here');
        $expected = '<div id="social-links"><ul><li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://codeswitch.be&title=Title&summary=A+summary+can+be+passed+here" class="social-button " id="" title="" rel=""><span class="fab fa-linkedin"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link_without_summary()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Title')->linkedin();
        $expected = '<div id="social-links"><ul><li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://codeswitch.be&title=Title&summary=" class="social-button " id="" title="" rel=""><span class="fab fa-linkedin"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link_with_a_custom_class()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Title', ['class' => 'my-class'])
            ->linkedin('A summary can be passed here');
        $expected = '<div id="social-links"><ul><li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://codeswitch.be&title=Title&summary=A+summary+can+be+passed+here" class="social-button my-class" id="" title="" rel=""><span class="fab fa-linkedin"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link_with_a_custom_class_and_custom_id()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Title', ['class' => 'my-class', 'id' => 'my-id'])
            ->linkedin('A summary can be passed here');
        $expected = '<div id="social-links"><ul><li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://codeswitch.be&title=Title&summary=A+summary+can+be+passed+here" class="social-button my-class" id="my-id" title="" rel=""><span class="fab fa-linkedin"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link_with_custom_prefix_and_suffix()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Title', [], '<ul>', '</ul>')
            ->linkedin('A summary can be passed here');
        $expected = '<ul><li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://codeswitch.be&title=Title&summary=A+summary+can+be+passed+here" class="social-button " id="" title="" rel=""><span class="fab fa-linkedin"></span></a></li></ul>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_linkedin_share_link_with_all_extra_options()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Title', ['class' => 'my-class my-class2', 'id' => 'linkedin-share', 'title' => 'My Title for SEO', 'rel' => 'nofollow'], '<ul>', '</ul>')
            ->linkedin('A summary can be passed here');
        $expected = '<ul><li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=https://codeswitch.be&title=Title&summary=A+summary+can+be+passed+here" class="social-button my-class my-class2" id="linkedin-share" title="My Title for SEO" rel="nofollow"><span class="fab fa-linkedin"></span></a></li></ul>';

        $this->assertEquals($expected, (string)$result);
    }
}
