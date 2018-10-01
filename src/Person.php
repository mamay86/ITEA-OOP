<?php
class Person
{
    private static $maxAge = 0;
    private $firstName;
    private $lastName;
    private $age;
    const MAX_POSSIBLE_AGE = 150;

    public static function getOldest()
    {
        return self::$maxAge;
    }
    public function __construct($firstName, $lastName, $age = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->setAge($age);
    }
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        if ($age>self::MAX_POSSIBLE_AGE) {
            echo \sprintf('Impossible age %d', $age) . \PHP_EOL;
        }

        $this->age = $age;
        if ($age>self::$maxAge) {
            self::$maxAge = $age;
        }
    }
}

// alt enter - on param
// ctrl k --- commits
// ctrl p ---- on parameter