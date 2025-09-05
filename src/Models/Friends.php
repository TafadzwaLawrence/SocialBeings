<?php

namespace TafadzwaLawrence\SocialBeings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Friends extends Model
{
    protected $table = 'friends';

    protected $fillable = [
        'friend_id',
        'friendable_id',
        'friendable_type',
    ];

    protected $keyType = 'int'; // Default key type

    public $incrementing = true; // Default incrementing

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (config('socialbeings.use_uuids')) {
            $this->keyType = 'string';
            $this->incrementing = false;
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
     * Get the friend of the friendship relationship.
     */
    public function friend()
    {
        return $this->belongsTo(config('socialbeings.user_model'), 'friend_id');
    }

    /**
     * Get the friendable model (could be User, Group, etc.).
     */
    public function friendable()
    {
        return $this->morphTo();
    }
}
