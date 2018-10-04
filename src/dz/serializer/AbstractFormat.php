<?php

require_once __DIR__ . '/FormatInterface.php';

abstract class AbstractFormat implements FormatInterface
{
    public function serialize($value)
    {
        echo \sprintf("[%s] serialized...\n", \spl_object_id($this));
    }

}
