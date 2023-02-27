<?php

declare(strict_types=1);

namespace FunMedia\interview\microprocessor\model;

use FunMedia\interview\microprocessor\exceptions\RegisterNotFound;

class RegisterState
/** This class shouldn't be changed! */
{
    /** @var array Registers - array with registers structured as Map<String, Register>. Example structure:
     * [
     *      ['A' => { Register with 'A' name }]
     *      ['z' => { Register with 'z' name }]
     * ]
     */
    private array $registers;

    /**
     * Constructor of the class that holds the current state of registers
     * @param array $registers - array of registers. Specifications shown above.
     */
    public function __construct(
        array $registers
    ){
        $this->registers = $registers;
    }

    /**
     * The method updates the value stored in the registry
     * @param Register $register - registry object whose value is to be updated
     * @throws RegisterNotFound - thrown when registry does not exist in registry state
     */
    public function updateValue(Register $register): void{
        if(!array_key_exists($register->getName(), $this->registers)){
            throw new RegisterNotFound($register->getName());
        }
        $this->registers[$register->getName()] = $register;
    }

    /**
     * Looks up and returns a registry by its name
     * @param String $registerName - one letter (A-Z, a-z) - registry name
     * @return Register - found register object
     * @throws RegisterNotFound - thrown when registry with passed $registerName doesn't exist in registry state
     */
    public function getRegister(String $registerName): Register{
        if(!array_key_exists($registerName, $this->registers)){
            throw new RegisterNotFound($registerName);
        }
        return $this->registers[$registerName];
    }

    /**
     * Set each of the registers to 0
     */
    public function reset(): void {
        /**
         * @var String $registerName
         * @var Register $register
         */
        foreach ($this->registers as $register){
            $register->setValue(0);
        }
    }
}