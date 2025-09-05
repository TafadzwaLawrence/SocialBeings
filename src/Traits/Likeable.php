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
        return $this->likes()->where('liker_id', $userId)->exists();
    }

    /**
     * like the model.
     *
     * @param  int  $userId
     * @return like
     */
    public function like($userId)
    {
        return $this->likes()->create(['liker_id' => $userId]);
    }

    /**
     * like the model.
     *
     * @param  int  $userId
     * @return like
     */
    public function unlike($userId)
    {
        return $this->likes()->where('liker_id', $userId)->delete();
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

    /**
     * Accessor to get the formatted count of followers.
     *
     * @return string
     */
    public function getFormattedLikersCountAttribute()
    {
        $count = $this->likes()->count();

        if ($count >= 1000) {
            return round($count / 1000, 1).'K';
        }

        return $count;
    }
}
