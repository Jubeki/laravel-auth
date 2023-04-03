<?php

declare(strict_types=1);

namespace ClaudioDekker\LaravelAuth\Testing\RateLimiting;

use ClaudioDekker\LaravelAuth\Testing\Partials\RateLimiting\AccountRecoveryChallengeWithoutRateLimitingTests;
use ClaudioDekker\LaravelAuth\Testing\Partials\RateLimiting\AccountRecoveryRequestWithoutRateLimitingTests;
use ClaudioDekker\LaravelAuth\Testing\Partials\RateLimiting\LoginWithoutRateLimitingTests;
use ClaudioDekker\LaravelAuth\Testing\Partials\RateLimiting\MultiFactorChallengeWithoutRateLimitingTests;
use ClaudioDekker\LaravelAuth\Testing\Partials\RateLimiting\SudoModeWithoutRateLimitingTests;

trait WithoutRateLimitingTests
{
    use LoginWithoutRateLimitingTests;
    use AccountRecoveryRequestWithoutRateLimitingTests;
    use AccountRecoveryChallengeWithoutRateLimitingTests;
    use MultiFactorChallengeWithoutRateLimitingTests;
    use SudoModeWithoutRateLimitingTests;
}
