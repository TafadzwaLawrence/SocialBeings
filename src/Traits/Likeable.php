<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

use TafadzwaLawrence\SocialBeings\Models\Like;

trait Likeable
{
    /**
     * Get all of the likes for the model.
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }

    /**
     * Check if the model is liked by a given user.
     *
     * @param  int  $userId
     * @return bool
     */
    public function isLikedBy($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    /**
     * Get the count of likes.
     *
     * @return int
     */
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }
}
