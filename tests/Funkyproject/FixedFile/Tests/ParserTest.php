<?php
namespace Funkyproject\FlatFile\Tests;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParseAllLine()
    {
        $config = new \Funkyproject\FlatFile\ConfigYml(__DIR__."/Resources/sage.paie.yml");
        $content = file_get_contents(__DIR__."/Resources/ecritures.pnm");
        $parser = new \Funkyproject\FlatFile\Parser($content, $config);

        $parser->parse(); $i = 0;

        while($line = $parser->next()) {
            $i++;
        }

        $this->assertEquals(11, $i);
    }

    public function testParseFirstLine()
    {
        $config = new \Funkyproject\FlatFile\ConfigYml(__DIR__."/Resources/sage.paie.yml");
        $content = file_get_contents(__DIR__."/Resources/ecritures.pnm");

        $parser = new \Funkyproject\FlatFile\Parser($content, $config);

        $parser->parse();
        $parser->next(); // entete;
        $line = $parser->next();

        $this->assertEquals('ACH', $line->get('code_journal'));
        $this->assertEquals('110103', $line->get('date_piece'));
        $this->assertEquals('FF', $line->get('type_piece'));
        $this->assertEquals('601019', $line->get('compte_generale'));
    }

    public function testParseLastLine()
    {
        $config = new \Funkyproject\FlatFile\ConfigYml(__DIR__."/Resources/sage.paie.yml");
        $content = file_get_contents(__DIR__."/Resources/ecritures.pnm");

        $parser = new \Funkyproject\FlatFile\Parser($content, $config);

        $parser->parse();

        for ($i=0; $i<11; $i++) {
            $line = $parser->next();
        }

        $this->assertEquals('ACH', $line->get('code_journal'));
        $this->assertEquals('110103', $line->get('date_piece'));
        $this->assertEquals('FF', $line->get('type_piece'));
        $this->assertEquals('4010000', $line->get('compte_generale'));
        $this->assertEquals('SAPHIRA', $line->get('compte_auxiliaire'));
        $this->assertEquals('FA1236', $line->get('reference'));
        $this->assertEquals('FA1236', $line->get('reference'));
    }
}