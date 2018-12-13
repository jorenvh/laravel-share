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
    public function it_can_generate_a_whatsapp_share_link_with_custom_share_text()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel')
            ->whatsapp();
        $expected = '<div id="social-links"><ul><li><a href="https://twitter.com/intent/tweet?text=Meet+Joren+Van+Hocht+a+php+developer+with+a+passion+for+laravel&url=https://codeswitch.be" class="social-button " id=""><span class="fa fa-twitter"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }
    

}
