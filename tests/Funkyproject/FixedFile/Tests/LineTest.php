<?php
namespace Funkyproject\FixedFile\Tests;


use Funkyproject\FixedFile\Line;

class LineTest extends \PHPUnit_Framework_TestCase
{
    public function testLineGet()
    {
        $config = $this->getConfig();
        $line = new Line('A1234DD', $config);

        $this->assertEquals('A', $line->get('input_1'));
    }

    public function testLineGetInput()
    {
        $config = $this->getConfig();
        $line = new Line('A1234DD', $config);

        $this->assertEquals('A', $line->getInput());
    }

    public function getConfig()
    {
        $dump = array('length' => 1, 'pos' => 1);

        $config = $this->getMockBuilder('Funkyproject\\FixedFile\\ConfigYml')
            ->disableOriginalConstructor()
            ->getMock();
        $config
            ->expects($this->once())
            ->method('get')
            ->will($this->returnValue($dump));

        return $config;
    }

}