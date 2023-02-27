<?php

declare(strict_types=1);

namespace FunMedia\interview\microprocessor\service;

use FunMedia\interview\microprocessor\model\RegisterState;

/** This interface shouldn't be changed! */
interface MicroprocessorSimulator
{
    /**
     * Definition of a method that executes the processor's instructions
     * @param array $instructions - array of strings with processor's instructions
     * @return RegisterState - state of registers after execution of all commands from the $instructions array
     */
    public function execute(array $instructions): RegisterState;
}