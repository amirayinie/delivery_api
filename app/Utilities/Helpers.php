<?php

namespace App\Utilities;

use Nette\Utils\Random;

function generateMobileNumber() :string
{
    return "09" . Random::generate(9,'0-9');
}
