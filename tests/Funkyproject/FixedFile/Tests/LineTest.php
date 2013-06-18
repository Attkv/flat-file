<?php
namespace Funkyproject\FlatFile\Tests;


use Funkyproject\FlatFile\Line;

class LineTest extends \PHPUnit_Framework_TestCase
{
    public function testLineGet()
    {
        $config = $this->getConfig();
        $line = new Line('A1234DD', $config);

        $this->assertEquals('A', $line->get('input_1'));
    }

    public function getConfig()
    {
        $dump = array('length' => 1, 'pos' => 1);

        $config = $this->getMockBuilder('Funkyproject\\FlatFile\\ConfigYml')
            ->disableOriginalConstructor()
            ->getMock();
        $config
            ->expects($this->once())
            ->method('get')
            ->will($this->returnValue($dump));

        return $config;
    }

}