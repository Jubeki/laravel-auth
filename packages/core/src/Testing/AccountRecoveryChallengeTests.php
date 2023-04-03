<?php

declare(strict_types=1);

namespace ClaudioDekker\LaravelAuth\Testing;

use ClaudioDekker\LaravelAuth\Testing\Partials\Challenges\Recovery\SubmitAccountRecoveryChallengeTests;
use ClaudioDekker\LaravelAuth\Testing\Partials\Challenges\Recovery\ViewAccountRecoveryChallengePageTests;

trait AccountRecoveryChallengeTests
{
    use ViewAccountRecoveryChallengePageTests;
    use SubmitAccountRecoveryChallengeTests;
}
