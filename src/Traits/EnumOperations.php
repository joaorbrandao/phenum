<?php


namespace Joaorbrandao\Phenum\Traits;

use ReflectionClass;
use ReflectionException;
use Joaorbrandao\Phenum\Exceptions\EnumValueNotFound;
use Joaorbrandao\Phenum\Exceptions\NoConstantsDefined;

trait EnumOperations
{
    /**
     * Get all constants of the enum.
     *
     * @return array
     * @throws ReflectionException
     */
    protected static function all()
    {
        $reflectionClass = new ReflectionClass(self::$class);
        return $reflectionClass->getConstants();
    }

    /**
     * Get all constant values of the enum.
     *
     * @return array
     * @throws NoConstantsDefined|ReflectionException
     */
    protected static function values()
    {
        $reflectionClass = new ReflectionClass(self::$class);
        $constants = $reflectionClass->getConstants();

        if (empty($constants)) {
            throw new NoConstantsDefined(self::$class);
        }

        return array_values($constants);
    }

    /**
     * @param $value
     * @throws EnumValueNotFound|ReflectionException
     */
    protected static function get($value)
    {
        $reflectionClass = new ReflectionClass(self::$class);
        $constants = $reflectionClass->getConstants();

        if (!in_array($value, $constants)) {
            throw new EnumValueNotFound($value);
        }

        return  array_flip($constants)[$value];
    }

    /**
     * Get the first constant of the enum.
     *
     * @return array
     * @throws NoConstantsDefined|ReflectionException
     */
    protected static function first()
    {
        $reflectionClass = new ReflectionClass(self::$class);
        $constants = $reflectionClass->getConstants();

        if (empty($constants)) {
            throw new NoConstantsDefined(self::$class);
        }

        $reverse = array_reverse($constants);
        return array_pop($reverse);
    }


    /**
     * Get the last constant of the enum.
     *
     * @return array
     * @throws NoConstantsDefined|ReflectionException
     */
    protected static function last()
    {
        $reflectionClass = new ReflectionClass(self::$class);
        $constants = $reflectionClass->getConstants();

        if (empty($constants)) {
            throw new NoConstantsDefined(self::$class);
        }

        return array_pop($constants);
    }

    /**
     * @param $value
     * @return bool
     * @throws ReflectionException
     */
    protected static function exists($value)
    {
        $reflectionClass = new ReflectionClass(self::$class);
        $constants = $reflectionClass->getConstants();

        return !empty($constants) && in_array($value, $constants);
    }
}
