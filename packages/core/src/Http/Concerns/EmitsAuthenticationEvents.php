<?php

namespace ClaudioDekker\LaravelAuth\Http\Concerns;

use ClaudioDekker\LaravelAuth\CredentialType;
use ClaudioDekker\LaravelAuth\Events\Authenticated;
use ClaudioDekker\LaravelAuth\Events\AuthenticationFailed;
use ClaudioDekker\LaravelAuth\Events\MultiFactorChallenged;
use ClaudioDekker\LaravelAuth\Events\MultiFactorChallengeFailed;
use ClaudioDekker\LaravelAuth\Events\SudoModeEnabled;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

trait EmitsAuthenticationEvents
{
    /**
     * Emits an event indicating that the user has been registered.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    protected function emitRegisteredEvent(Authenticatable $user): void
    {
        Event::dispatch(new Registered($user));
    }

    /**
     * Emits an event indicating that the user was fully authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    protected function emitAuthenticatedEvent(Request $request, Authenticatable $user): void
    {
        Event::dispatch(new Authenticated($request, $user));
    }

    /**
     * Emits an event indicating that the authentication attempt has failed.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function emitAuthenticationFailedEvent(Request $request): void
    {
        /** @var string|null $username */
        $username = $request->input($this->usernameField());

        Event::dispatch(new AuthenticationFailed($request, $username));
    }

    /**
     * Emits an event indicating that the user has been locked out for a while.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function emitLockoutEvent(Request $request): void
    {
        Event::dispatch(new Lockout($request));
    }

    /**
     * Emits an event indicating the user received a multi-factor authentication challenge.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    protected function emitMultiFactorChallengedEvent(Request $request, Authenticatable $user): void
    {
        Event::dispatch(new MultiFactorChallenged($request, $user));
    }

    /**
     * Emits an event indicating that the multi-factor challenge attempt has failed.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \ClaudioDekker\LaravelAuth\CredentialType  $type
     * @return void
     */
    protected function emitMultiFactorChallengeFailedEvent(Request $request, Authenticatable $user, CredentialType $type): void
    {
        Event::dispatch(new MultiFactorChallengeFailed($request, $user, $type));
    }

    /**
     * Emits an event indicating that sudo-mode was enabled.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function emitSudoModeEnabledEvent(Request $request): void
    {
        Event::dispatch(new SudoModeEnabled($request, $request->user()));
    }
}
