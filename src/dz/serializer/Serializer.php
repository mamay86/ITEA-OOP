<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 04.10.18
 * Time: 15:34
 */

//require_once __DIR__ . '/FormatInterface.php';

class Serializer
{
    public $formats = [];

    public function addFormat(FormatInterface $format)
    {
        $this->formats[] = $format;
    }

    public function serialize($value)
    {
        $className = get_class($value);
        foreach ($this->formats as $format) {
            if (get_class($format) == $className::SERIALIZABLE_FORMAT."Serializer") {
                return $format->serialize($value);
            }
        }
    }
}