<?php

namespace FunMedia\interview\demo\service;

use FunMedia\interview\microprocessor\exceptions\RegisterNameNotMeetConditions;
use FunMedia\interview\microprocessor\exceptions\RegisterNotFound;
use FunMedia\interview\microprocessor\model\RegisterState;
use FunMedia\interview\microprocessor\model\Register;
use FunMedia\interview\microprocessor\service\MicroprocessorSimulator;
use JetBrains\PhpStorm\NoReturn;

class Simulator extends Register implements MicroprocessorSimulator
{

    /**
     * @param array $instructions
     * @return RegisterState
     */
    public function execute(array $instructions): RegisterState
    {
        return new RegisterState(array());
    }

    /**
     * This instruction sets the value of register A to 10 (which is an integer value). The value can be negative
     * since the Register can store signed integer values.
     *
     * @param Register $register
     * @return void
     */
    public function setAAs10(): void
    {
        $register = new Register('A');
        $register->setValue(10);

        print_r($register);
    }

    /**
     * This instruction adds the content of register D into register C. The updated value is stored back in Register C.
     *
     * @throws RegisterNameNotMeetConditions
     */
    #[NoReturn] public function addDToC(Register $register): int
    {
        $registerC = new Register('C');
        $registerD = new Register('D');

        $registerC = $registerC->setValue(13);
        $registerD = $registerD->setValue(17);

        print_r( $registerC->getValue() + $registerD->getValue());

//        return $registerC->getValue() + $registerD->getValue();
    }

    /**
     * This instruction adds the integer 12 to the existing value as stored in Register A, the updated value is stored
     * back in Register A.
     *
     * @return null
     */
    public function add12ToA()
    {
        $register = new Register('A');
        $valueA = $register->getValue();
        return $register->setValue($valueA + 12);
    }

    /**
     * This instruction moves/updates the value of register A with the value which was stored in Register B. The value
     * of register B remains unchanged. Ex: If A = 10, B = 15, then MOV A B would result in A = 15, B = 15.
     *
     * @return int|null
     */
    public function moveAToB(): int | null
    {
        $registerA = new Register('A');
        $registerB = new Register('B');
        $registerA->setValue($registerB->getValue());

        return $registerA->getValue();
    }

    /**
     * This instruction increments the value stored in register C by 1. The updated value is stored back in register C.
     *
     * @return Register|mixed
     */
    public function incrementsC(): mixed
    {
        $registerC = new Register('C');
        $registerC->setValue(10);
        $valueC= $registerC->getValue();

        for ($i = 0; $i <= $valueC; --$valueC) {
            $valueC = $valueC;
        }

        return $valueC;
    }

    /**
     * This decrements the value of register A. The updated value is stored back in register A.
     *
     * @return string|Register
     */
    public function decrementsA(): string|Register
    {
        $registerA = new Register('A');
        $registerA->setValue(10);
        $valueA= $registerA->getValue();


        for ($i = 0; $i <= $valueA; --$valueA) {
            $valueA = $valueA;
        }

        return $valueA;
    }

    /**
     * This command resets all the currently stored values across all the available registers (A, B, C, and D).
     *
     * @return void
     * @throws RegisterNameNotMeetConditions
     */
    public function resetAll(): void
    {
        $registersNames = ['A', 'B', 'C', 'D'];

        foreach ($registersNames as $registersName) {
            $allRegisters[] = new Register($registersName);
                $r = new RegisterState($allRegisters);
                $r->reset();
            }

        print_r($allRegisters);
    }

}