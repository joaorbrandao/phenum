<?php


namespace Joaorbrandao\Phenum\Validators;

use ReflectionClass;
use Joaorbrandao\Phenum\Exceptions\DuplicateConstant;
use Joaorbrandao\Phenum\Exceptions\NoConstantsDefined;

class EnumsValidator
{
    private $constants;

    /**
     * @param string $class
     * @throws NoConstantsDefined|DuplicateConstant
     */
    public function validate(string $class)
    {
        $this->constants = $this->getConstants($class);

        if (empty($this->constants)) {
            throw new NoConstantsDefined($class);
        }

        $this->validateExistingValues();
    }

    private function getConstants(string $class)
    {
        $reflectionClass = new ReflectionClass($class);
        return $reflectionClass->getConstants();
    }

    /**
     * @throws DuplicateConstant
     */
    private function validateExistingValues()
    {
        $values = [];

        foreach ($this->constants as $constant => $value) {
            if (in_array($value, $values, true)) {
                $firstConstant = $this->getFirstWithValue($value);

                throw new DuplicateConstant($firstConstant, $value);
            }

            $values[] = $value;
        }
    }

    private function getFirstWithValue($needle)
    {
        foreach ($this->constants as $constant => $value) {
            if ($value === $needle) {
                return $constant;
            }
        }

        return null;
    }
}
