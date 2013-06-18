<?php
namespace Funkyproject\FixedFile\Tests;

use Funkyproject\FixedFile\ConfigYml;

class ConfigYmlTest extends \PHPUnit_Framework_TestCase
{
    public function testDumpIsNotNull()
    {
        $config = new ConfigYml(__DIR__.'/Resources/test.yml');
        $this->assertNotNull($config->dump());
    }

}