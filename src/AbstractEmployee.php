<?php

require_once __DIR__ . '/EmployeeInterface.php';

abstract class AbstractEmployee implements EmployeeInterface
{
    public function work()
    {
        echo \sprintf("[%s] Working...\n", \spl_object_id($this));
    }

    public function pause($minutes)
    {
        echo \sprintf("[%s] Pause work for %d minutes.\n", \spl_object_id($this), $minutes);
    }
}
