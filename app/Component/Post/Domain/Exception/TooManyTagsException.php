<?php

namespace App\Component\Post\Domain\Exception;

use Exception;

class TooManyTagsException extends Exception
{
    protected $message = "Too many tags";
}
