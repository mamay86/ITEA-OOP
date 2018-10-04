<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 04.10.18
 * Time: 15:26
 */

require_once __DIR__ . '/AbstractFormat.php';

class JsonSerializer extends AbstractFormat
{
    public function serialize($value)
    {
        return \serialize($value);
    }
}