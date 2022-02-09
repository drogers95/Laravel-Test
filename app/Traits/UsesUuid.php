<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * Trait UsesUuid
 * @package App\Traits
 */
trait UsesUuid
{
    public static function boot() : void
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing() : bool
    {
        return false;
    }

    /**
     * Get the primary key for the model.
     *
     * @return string
     */
    public function getKeyName() : string
    {
        return 'uuid';
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType() : string
    {
        return 'string';
    }
}
