<?php

declare(strict_types=1);

namespace FunMedia\interview\microprocessor\model;

use FunMedia\interview\microprocessor\exceptions\RegisterNameNotMeetConditions;

/** This class shouldn't be changed! */
class Register
{
    private int $value;
    private String $name;

    /**
     * The constructor of model class Register
     * @param String $name - one letter (A-Z, a-z)
     * @throws RegisterNameNotMeetConditions - thrown when $name contains more than one letter
     */
    public function __construct(
        String $name
    )
    {
        if(!$this->validateName($name)){
            throw new RegisterNameNotMeetConditions();
        }

        $this->name = $name;
        $this->value = 0;
    }

    /**
     * Function returns name of Register.
     * @return String - name of register
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Function returns value of Register.
     * @return int - value of register
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Function sets up new value of register.
     * @param int $value - new value of register
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    public function equals(self $other): bool {
        if($this === $other){
            return true;
        }

        return
            $this->value === $other->value &&
            $this->name === $other->name;
    }

    private function validateName(String $name): bool{
        return strlen($name) === 1 and ctype_alpha($name);
    }
}