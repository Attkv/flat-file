<?php

namespace Funkyproject\FixedFile;

class Line
{
    private $config;
    private $content;

    public function __construct($content, ConfigYml $config)
    {
        $this->config = $config;
        $this->content = $content;
    }

    public function get($key)
    {
        $config = $this->config->get($key);

        return substr($this->content, $config['pos'] - 1, $config['length']);
    }

}