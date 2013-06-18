<?php

namespace Funkyproject\FlatFile;

use Funkyproject\FlatFile\ConfigYml;

class Parser
{
    public function __construct($content, ConfigYml $config )
    {
        $this->content = $content;
        $this->lines = new \SplQueue();
        $this->config = $config;
    }

    public function parse()
    {
            foreach( explode("\n", $this->content) as $line ) {
                $this->parseLine($line);
            }

            $this->lines->rewind();
    }

    public function parseLine($content)
    {
        $line = new Line($content, $this->config);
        $this->lines->push($line);
    }

    public function next()
    {
        if ($this->lines->valid())
        {
            $current = $this->lines->current();
            $this->lines->next();

            return $current;
        }

        return false;
    }
}
