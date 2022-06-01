<?php

namespace App\Exception;

use Exception;

class NotSupportedFileFormatException extends Exception
{
    public function __construct(string $fileFormat)
    {
        parent::__construct("File format not supported: $fileFormat");
    }
}
