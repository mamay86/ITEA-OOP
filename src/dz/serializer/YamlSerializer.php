<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 04.10.18
 * Time: 15:26
 */
require_once __DIR__ . "/../../../vendor/autoload.php";
require_once __DIR__ . '/AbstractFormat.php';

use Symfony\Component\Yaml\Yaml;

class YamlSerializer extends AbstractFormat
{
    public function serialize($value)
    {
        return Yaml::dump((array)$value);
    }
}