<?php

namespace Funkyproject\Sage;

use Funkyproject\FlatFile\ConfigYml;

class Parser
{
    public function __construct($content, ConfigYml $config )
    {
        $this->content = $content;
        $this->lines = new \SplHeap();
        $this->config = $config
    }

    public function parse()
    {
            foreach( explode("\n", $this->content) as $line ) {
                $this->parseLine($line);
            }
    }

    public function parseLine($content)
    {
        $line = new Line($content, $this->config);
        $this->lines->insert($line);
    }
}
