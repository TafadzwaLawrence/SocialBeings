<?php

namespace TafadzwaLawrence\SocialBeings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Follow extends Model
{
    protected $table = 'follows';

    protected $fillable = [
        'follower_id',
        'followable_id',
        'followable_type',
    ];

    protected $keyType;

    public $incrementing;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

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

    /**
     * Get the follower of the follow relationship.
     */
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    /**
     * Get the followable model (could be User, Post, etc.).
     */
    public function followable()
    {
        return $this->morphTo();
    }
}
