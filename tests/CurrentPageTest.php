<?php

namespace Jorenvh\Share\Test;

use Jorenvh\Share\ShareFacade;

class CurrentPageTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_use_the_url_of_the_current_request()
    {
        $result = ShareFacade::currentPage()->facebook();
        $expected = '<div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u=http://mysite.com/" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li></ul></div>';

        $this->assertEquals($expected, $result);
    }
}