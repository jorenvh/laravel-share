<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class OptionTitleTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_set_the_title_option()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, ['title' => 'My Custom Title'])->facebook();

        $this->assertEquals(preg_match('/<a href=.*? title="My Custom Title".*?>/', $result), 1);
    }

    /**
     * @test
     */
    public function it_can_set_the_title_option_with_fa5()
    {
        config(['laravel-share.fontAwesomeVersion' => 5]);
        $result = ShareFacade::page('https://codeswitch.be', null, ['title' => 'My Custom Title'])->facebook();

        $this->assertEquals(preg_match('/<a href=.*? title="My Custom Title".*?>/', $result), 1);
    }
}
