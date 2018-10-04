<?php

require_once __DIR__ . '/MacroableTrait.php';

class StringHelper
{
    use MacroableTrait;

    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    public function __toString()
    {
        return $this->str;
    }

    public function toLowerCase()
    {
        $this->str = \strtolower($this->str);

        return $this;
    }
}
