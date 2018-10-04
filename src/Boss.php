<?php

class Boss
{
    private $employees = [];

    public function addEmployee(EmployeeInterface $employee)
    {
        $this->employees[] = $employee;
    }

    public function starWork()
    {
        foreach ($this->employees as $employee) {
            $employee->work();
        }

        // TODO: delay before pause logic

        foreach ($this->employees as $employee) {
            if ($employee instanceof EatInterface) {
                $employee->eat();
            }
        }
    }
}
