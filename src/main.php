<?php
declare(strict_types=1);

namespace FunMedia\interview\microprocessor;

//loader
require_once 'exceptions/RegisterNameNotMeetConditions.php';
require_once 'exceptions/RegisterNotFound.php';
require_once 'model/Register.php';
require_once 'model/RegisterState.php';
require_once 'service/MicroprocessorSimulator.php';
require_once 'service/Simulator.php';

//uses
use FunMedia\interview\demo\service\Simulator;
use FunMedia\interview\microprocessor\exceptions\RegisterNotFound;
use FunMedia\interview\microprocessor\exceptions\RegisterNameNotMeetConditions;
use FunMedia\interview\microprocessor\model\Register;
use FunMedia\interview\microprocessor\model\RegisterState;
use FunMedia\interview\microprocessor\service\MicroprocessorSimulator;

$register = new Register('A');
$simulator = new Simulator('A');
$simulator->setAAs10($register);

try {
    $simulator->addDToC( new Register('C'));
} catch (RegisterNameNotMeetConditions $e) {
}

//TODO $instructions
//array_push($instructions, "RST");
//array_push($instructions, "SET A 1");
//array_push($instructions, "SET B -2");
//array_push($instructions, "SET C 3");
//array_push($instructions, "SET D 4");

$simulator->add12ToA();
$simulator->moveAToB();
$simulator->incrementsC();
$simulator->decrementsA();
try {
    $simulator->resetAll();
} catch (RegisterNameNotMeetConditions $e) {
}

