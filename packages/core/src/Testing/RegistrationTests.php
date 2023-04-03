<?php

declare(strict_types=1);

namespace ClaudioDekker\LaravelAuth\Testing;

use ClaudioDekker\LaravelAuth\Testing\Partials\SubmitPasskeyBasedRegistrationTests;
use ClaudioDekker\LaravelAuth\Testing\Partials\SubmitPasswordBasedRegistrationTests;
use ClaudioDekker\LaravelAuth\Testing\Partials\ViewRegistrationPageTests;

trait RegistrationTests
{
    use ViewRegistrationPageTests;
    use SubmitPasskeyBasedRegistrationTests;
    use SubmitPasswordBasedRegistrationTests;
}
