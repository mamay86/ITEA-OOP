<?php

class Person implements \JsonSerializable
{
    const MAX_POSSIBLE_AGE = 150;

    private static $maxAge = 0;

    private $firstName;
    private $lastName;
    private $age;

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

    public function __toString()
    {
        return $this->firstName . ' ' . $this->lastName . \PHP_EOL;
    }

    public function __get($name)
    {
        $methodName = \ucfirst($name);
        $getter = 'get' . $methodName;

        if (\method_exists($this, $getter)) {
            return $this->$getter();
        } elseif (\method_exists('set' . $methodName)) {
            throw new \LogicException(\sprintf('Cannot access property %s', $name));
        }

        throw new \LogicException(\sprintf('Property %s not exists!', $name));
    }

    public function __set($name, $value)
    {
        $methodName = \ucfirst($name);
        $setter = 'set' . $methodName;

        if (\method_exists($this, $setter)) {
            $this->$setter($value);
        } elseif (\method_exists($this, 'get'. $methodName)) {
            throw new \LogicException(\sprintf('Property %s read only!' , $name));
        }

        throw new \LogicException(\sprintf('Property %s not exists!', $name));
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }

    public function __unset($name)
    {
        $this->$name = null;
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
        if ($age > self::MAX_POSSIBLE_AGE) {
            throw new \RuntimeException(\sprintf('Impossible age %d', $age));
        }

        $this->age = $age;

        if ($age > self::$maxAge) {
            self::$maxAge = $age;
        }
    }

    public function jsonSerialize()
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'age' => $this->age,
        ];
    }
}

// alt enter - on param
// ctrl k --- commits
// ctrl p ---- on parameter