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
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id=""><span class="fa fa-whatsapp"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_share_link_with_default_share_text_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be')->whatsapp();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id=""><span class="fab fa-whatsapp"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }
    
    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_share_link_with_a_custom_class()
    {
        $result = ShareFacade::page('https://codeswitch.be', , ['class' => 'my-class'])
            ->whatsapp();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button my-class" id=""><span class="fa fa-whatsapp"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_share_link_with_a_custom_class_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', , 'Meet Joren Van Hocht a php developer with a passion for laravel', ['class' => 'my-class'])
            ->whatsapp();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button my-class" id=""><span class="fab fa-whatsapp"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_share_link_with_a_custom_id()
    {
        $result = ShareFacade::page('https://codeswitch.be', , ['id' => 'my-id'])
            ->twitter();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id="my-id"><span class="fa fa-whatsapp"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_whatsapp_share_link_with_a_custom_id_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel', ['id' => 'my-id'])
            ->twitter();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://wa.me/?text=https://codeswitch.be" class="social-button " id="my-id"><span class="fab fa-whatsapp"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }

    

}
