<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class WhatsappShareTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_share_link_with_default_share_text()
    {
        $result = ShareFacade::page('https://codeswitch.be')->whatsapp();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id="" title="" rel=""><span class="fab fa-whatsapp"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_share_link_with_a_custom_class()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class'])
            ->whatsapp();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button my-class" id="" title="" rel=""><span class="fab fa-whatsapp"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_share_link_with_a_custom_id()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, ['id' => 'my-id'])
            ->whatsapp();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id="my-id" title="" rel=""><span class="fab fa-whatsapp"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_share_link_with_a_custom_class_and_custom_id()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class', 'id' => 'my-id'])
            ->whatsapp();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button my-class" id="my-id" title="" rel=""><span class="fab fa-whatsapp"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_share_link_with_custom_prefix_and_suffix()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, [], '<ul>', '</ul>')
            ->whatsapp();
        $expected = '<ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id="" title="" rel=""><span class="fab fa-whatsapp"></span></a></li></ul>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_share_link_with_all_extra_options()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, ['class' => 'my-class', 'id' => 'my-id', 'title' => 'My Title for SEO', 'rel' => 'nofollow'], '<ul>', '</ul>')
            ->whatsapp();
        $expected = '<ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button my-class" id="my-id" title="My Title for SEO" rel="nofollow"><span class="fab fa-whatsapp"></span></a></li></ul>';

        $this->assertEquals($expected, (string)$result);
    }
}
