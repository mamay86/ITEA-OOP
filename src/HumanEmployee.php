<?php

require_once __DIR__ . '/AbstractEmployee.php';
require_once __DIR__ . '/EatInterface.php';

class HumanEmployee extends AbstractEmployee implements EatInterface
{
    const EATING_PAUSE_DURATION = 60;

    public function eat()
    {
        $this->pause(self::EATING_PAUSE_DURATION);

        echo \sprintf("[%s] Eating...\n", \spl_object_id($this));
    }
}
