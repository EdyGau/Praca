<?php

declare(strict_types=1);

namespace FunMedia\interview\microprocessor\tests\service;


use FunMedia\interview\demo\service\Simulator;
use FunMedia\interview\microprocessor\exceptions\RegisterNotFound;
use FunMedia\interview\microprocessor\model\RegisterState;
use FunMedia\interview\microprocessor\service\MicroprocessorSimulator;
use PHPUnit\Framework\TestCase;

final class microprocessorSimulatorTest extends TestCase
{
    private MicroprocessorSimulator $simulator;

    protected function setUp(): void{
        $this->simulator = new Simulator();
    }

    /**
     * @throws RegisterNotFound
     */
    public function testResetRegisterInstructions(): void {
        $instructions = [];
        array_push($instructions, "RST");
        array_push($instructions, "SET A 5");
        array_push($instructions, "SET B 2");
        array_push($instructions, "SET C 3");
        array_push($instructions, "SET D 4");
        array_push($instructions, "RST");

        $state = $this->simulator->execute($instructions);
        $this->assertEquals(0, $state->getRegister('A')->getValue());
        $this->assertEquals(0, $state->getRegister('B')->getValue());
        $this->assertEquals(0, $state->getRegister('C')->getValue());
        $this->assertEquals(0, $state->getRegister('D')->getValue());
    }


    public function testEnvironmentSetUpAssertTrue(): void{
        $this->assertTrue(true);
    }

    public function testEnvironmentSetUpAssertFalse(): void{
        $this->assertFalse(false);
    }

    public function testSetInstructions() :void{
        /** @var array[String] */
        $instructions = [];
        array_push($instructions, "RST");
        array_push($instructions, "SET A 1");
        array_push($instructions, "SET B -2");
        array_push($instructions, "SET C 3");
        array_push($instructions, "SET D 4");

        /** @var RegisterState */
        $state = $this->simulator->execute($instructions);
        $this->assertEquals( 1, $state->getRegister('A')->getValue());
        $this->assertEquals(-2, $state->getRegister('B')->getValue());
        $this->assertEquals( 3, $state->getRegister('C')->getValue());
        $this->assertEquals( 4, $state->getRegister('D')->getValue());
    }

    public function testAddValueInstructions(): void {
        // testing for subtraction
        $instructions = [];
        array_push($instructions, "RST");
        array_push($instructions, "SET A 11");
        array_push($instructions, "ADD A -12");

        /** @var RegisterState */
        $state = $this->simulator->execute($instructions);
        $this->assertEquals( -1, $state->getRegister('A')->getValue());
    }

    public function testAddRegisterInstructions(): void {
        $instructions = [];
        array_push($instructions, "RST");
        array_push($instructions, "SET C 5");
        array_push($instructions, "SET D 2");
        array_push($instructions, "ADR C D");

        /** @var RegisterState */
        $state = $this->simulator->execute($instructions);
        $this->assertEquals( 7, $state->getRegister('C')->getValue());
    }

    public function testMoveRegisterInstructions(): void {
        $instructions = [];
        array_push($instructions, "RST");
        array_push($instructions, "SET A 5");
        array_push($instructions, "SET B 2");
        array_push($instructions, "SET D 12");
        array_push($instructions, "MOV B A");
        array_push($instructions, "MOV D B");

        /** @var RegisterState */
        $state = $this->simulator->execute($instructions);
        $this->assertEquals( 5, $state->getRegister('B')->getValue());
        $this->assertEquals( 5, $state->getRegister('D')->getValue());
    }

    public function testIncrementDecrementRegisterInstructions(): void {
        $instructions = [];
        array_push($instructions, "RST");
        array_push($instructions, "SET A 5");
        array_push($instructions, "SET B 2");
        array_push($instructions, "INR A");
        array_push($instructions, "DCR B");

        /** @var RegisterState */
        $state = $this->simulator->execute($instructions);
        $this->assertEquals( 6, $state->getRegister('A')->getValue());
        $this->assertEquals( 1, $state->getRegister('B')->getValue());
    }


    public function testMultipleInstructionsWithNOOP(): void {
        $instructions = [];
        array_push($instructions, "RST");
        array_push($instructions, "SET A 10");
        array_push($instructions, "SET B 14");
        array_push($instructions, "ADD B 12");
        array_push($instructions, "INR A");
        array_push($instructions, "DCR B");

        /** @var RegisterState */
        $state = $this->simulator->execute($instructions);
        $this->assertEquals(11, $state->getRegister('A')->getValue());
        $this->assertEquals(25, $state->getRegister('B')->getValue());
    }


}