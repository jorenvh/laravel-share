<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class TelegramShareTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_generate_a_telegram_share_link_with_default_share_text()
    {
        $result = ShareFacade::page('https://codeswitch.be')->telegram();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=Default+share+text" class="social-button " id="" title="" rel=""><span class="fa-brands fa-telegram"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_telegram_share_link_with_custom_share_text()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel')
            ->telegram();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=Meet+Joren+Van+Hocht+a+php+developer+with+a+passion+for+laravel" class="social-button " id="" title="" rel=""><span class="fa-brands fa-telegram"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_telegram_share_link_with_a_custom_class()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel', ['class' => 'my-class'])
            ->telegram();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=Meet+Joren+Van+Hocht+a+php+developer+with+a+passion+for+laravel" class="social-button my-class" id="" title="" rel=""><span class="fa-brands fa-telegram"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_telegram_share_link_with_a_custom_id()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel', ['id' => 'my-id'])
            ->telegram();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=Meet+Joren+Van+Hocht+a+php+developer+with+a+passion+for+laravel" class="social-button " id="my-id" title="" rel=""><span class="fa-brands fa-telegram"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_telegram_share_link_with_a_custom_class_and_custom_id()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel', ['class' => 'my-class', 'id' => 'my-id'])
            ->telegram();
        $expected = '<div id="social-links"><ul><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=Meet+Joren+Van+Hocht+a+php+developer+with+a+passion+for+laravel" class="social-button my-class" id="my-id" title="" rel=""><span class="fa-brands fa-telegram"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_telegram_share_link_with_custom_prefix_and_suffix()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, [], '<ul>', '</ul>')
            ->telegram();
        $expected = '<ul><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=Default+share+text" class="social-button " id="" title="" rel=""><span class="fa-brands fa-telegram"></span></a></li></ul>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_telegram_share_link_with_all_extra_options()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel', ['class' => 'my-class', 'id' => 'my-id', 'title' => 'My Title for SEO', 'rel' => 'nofollow'], '<ul>', '</ul>')
            ->telegram();
        $expected = '<ul><li><a target="_blank" href="https://telegram.me/share/url?url=https://codeswitch.be&text=Meet+Joren+Van+Hocht+a+php+developer+with+a+passion+for+laravel" class="social-button my-class" id="my-id" title="My Title for SEO" rel="nofollow"><span class="fa-brands fa-telegram"></span></a></li></ul>';

        $this->assertEquals($expected, (string)$result);
    }
}
