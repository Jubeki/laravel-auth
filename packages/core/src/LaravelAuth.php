<?php

namespace ClaudioDekker\LaravelAuth;

use ClaudioDekker\LaravelAuth\Models\Contracts\AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class LaravelAuth
{
    /**
     * Indicates if the Laravel Auth migrations will be run.
     */
    public static bool $runsMigrations = true;

    /**
     * The Multi-Factor Credential model class name.
     */
    public static string $multiFactorCredentialModel = MultiFactorCredential::class;

    /**
     * The Multi-Factor Credential model class name.
     */
    public static string $userModel;

    /**
     * Configure Laravel Auth to not register its migrations.
     */
    public static function ignoreMigrations(): static
    {
        static::$runsMigrations = false;

        return new static();
    }

    /**
     * Set the User model class name.
     */
    public static function useUserModel(string $model): void
    {
        if (! is_subclass_of($model, Model::class, true)) {
            throw new \Exception("The user model class [{$model}] must extend [".Model::class."].");
        }

        if (! is_subclass_of($model, AuthenticatableContract::class, true)) {
            throw new \Exception("The user model class [{$model}] must implement [".AuthenticatableContract::class."].");
        }

        static::$userModel = $model;
    }

    /**
     * Get the User model class name.
     * 
     * @return class-string<\ClaudioDekker\LaravelAuth\Models\Contracts\AuthenticatableContract&\Illuminate\Database\Eloquent\Model>
     */
    public static function userModel(): string
    {
        return static::$userModel;
    }

    /**
     * Set the Multi-Factor Credential model class name.
     */
    public static function useMultiFactorCredentialModel(string $model): void
    {
        static::$multiFactorCredentialModel = $model;
    }

    /**
     * Get the Multi-Factor Credential model class name.
     */
    public static function multiFactorCredentialModel(): string
    {
        return static::$multiFactorCredentialModel;
    }

    /**
     * Get a new Multi-Factor Credential model instance.
     *
     * @return \ClaudioDekker\LaravelAuth\MultiFactorCredential
     */
    public static function multiFactorCredential()
    {
        return new static::$multiFactorCredentialModel();
    }
}
