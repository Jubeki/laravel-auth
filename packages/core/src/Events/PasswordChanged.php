<?php

declare(strict_types=1);

namespace ClaudioDekker\LaravelAuth\Events;

use Illuminate\Contracts\Auth\Authenticatable;

class PasswordChanged
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public Authenticatable $user
    ) {
        //
    }
}
