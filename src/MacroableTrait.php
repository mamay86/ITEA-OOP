<?php

trait MacroableTrait
{
    private static $macros = [];

    public static function macro($name, $macro)
    {
        self::$macros[$name] = $macro;
    }

    public function __call($name, $parameters)
    {
        if (!isset(self::$macros[$name])) {
            throw new \BadMethodCallException(\sprintf('Macros "%s" not exists!', $name));
        }

        $macro = self::$macros[$name];

        if ($macro instanceof \Closure) {
            return \call_user_func_array($macro->bindTo($this, static::class), $parameters);
        }

        return \call_user_func_array($macro, $parameters);
    }
}
