<?php

namespace TafadzwaLawrence\SocialBeings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    // Set the key type and incrementing based on the configuration
    protected $keyType;

    public $incrementing;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Set key type and incrementing based on configuration
        if (config('socialbeings.use_uuids')) {
            $this->keyType = 'string';
            $this->incrementing = false;
        } else {
            $this->keyType = 'int';
            $this->incrementing = true;
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (config('socialbeings.use_uuids')) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Get the subscriber of the subscription relationship.
     */
    public function subscriber()
    {
        return $this->belongsTo(config('socialbeings.user_model'), 'subscriber_id');
    }

    /**
     * Get the subscribable model (could be User, Channel, etc.).
     */
    public function subscribable()
    {
        return $this->morphTo();
    }
}
