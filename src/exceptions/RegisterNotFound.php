<?php

declare(strict_types=1);

namespace FunMedia\interview\microprocessor\exceptions;

use Exception;

class RegisterNotFound extends Exception
{
    public function __construct($registerName)
    {
        parent::__construct('The register ' . $registerName . ' is not present.');
    }
}