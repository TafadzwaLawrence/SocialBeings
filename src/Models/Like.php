<?php

namespace TafadzwaLawrence\SocialBeings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Like extends Model
{
    protected $table = 'likes';

    protected $fillable = [
        'liker_id',
        'likable_id',
        'likable_type',
    ];

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

    public function liker()
    {
        return $this->belongsTo(config('socialbeings.user_model'), 'liker_id');
    }

    public function likable()
    {
        return $this->morphTo();
    }
}
