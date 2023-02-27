<?php

declare(strict_types=1);

namespace FunMedia\interview\microprocessor\exceptions;

use Exception;

class RegisterNameNotMeetConditions extends Exception
{
    public function __construct($message = "Name should be 1 character long and constains only letters A-Z and a-z.")
    {
        parent::__construct($message);
    }
}