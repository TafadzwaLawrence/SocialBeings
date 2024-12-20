<?php

namespace TafadzwaLawrence\SocialBeings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Favourite extends Model
{
    protected $table = 'favourites';

    protected $fillable = [
        'favor_id',
        'favorable_id',
        'favorable_type',
    ];

    protected $keyType;

    public $incrementing;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

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
     * Get the follower of the follow relationship.
     */
    public function favor()
    {
        return $this->belongsTo(User::class, 'favor_id');
    }

    /**
     * Get the followable model (could be User, Post, etc.).
     */
    public function favorable()
    {
        return $this->morphTo();
    }
}
