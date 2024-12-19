<?php

namespace TafadzwaLawrence\SocialBeings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Like extends Model
{
    protected $table = 'likes';

    // Set the key type and incrementing based on the configuration
    protected $keyType;

    public $incrementing;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Set key type and incrementing based on configuration
        if (config('likesocial.use_uuids')) {
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
            if (config('likesocial.use_uuids')) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likable()
    {
        return $this->morphTo();
    }
}
