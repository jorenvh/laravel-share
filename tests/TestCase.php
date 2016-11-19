<?php

namespace Jorenvh\Share\Test;

use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * Load Laravel share service provider
     *
     * @param \Illuminate\Foundation\Application $application
     * @return array
     */
    protected function getPackageProviders($application)
    {
        return ['Jorenvh\Share\Providers\ShareServiceProvider'];
    }
}
