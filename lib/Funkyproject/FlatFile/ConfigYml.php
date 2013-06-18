<?php

namespace Funkyproject\FlatFile;

class ConfigYml
{
    private $config;

    public function __construct($file_path)
    {
        $this->config = \Symfony\Component\Yaml\Yaml::parse($file_path);
    }

    public function get($key)
    {
     
        return $this->config[$key];
    }

    public function dump()
    {
        return $this->config;
    }
}