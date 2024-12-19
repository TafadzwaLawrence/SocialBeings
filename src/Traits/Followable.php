<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

use TafadzwaLawrence\SocialBeings\Models\Follow;

trait Followable
{
    /**
     * Get all of the followers for the model.
     */
    public function followers()
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    /**
     * Determine if the model is followed by a given user.
     *
     * @param  int  $userId
     * @return bool
     */
    public function isFollowedBy($userId)
    {
        return $this->followers()->where('follower_id', $userId)->exists();
    }

    /**
     * Follow the model.
     *
     * @param  int  $userId
     * @return Follow
     */
    public function follow($userId)
    {
        return $this->followers()->create(['follower_id' => $userId]);
    }

    /**
     * Unfollow the model.
     *
     * @param  int  $userId
     * @return int
     */
    public function unfollow($userId)
    {
        return $this->followers()->where('follower_id', $userId)->delete();
    }

    /**
     * Accessor to get the count of followers.
     *
     * @return int
     */
    public function getFollowersCountAttribute()
    {
        return $this->followers()->count();
    }

    /**
     * Accessor to get the formatted count of followers.
     *
     * @return string
     */
    public function getFormattedFollowersCountAttribute()
    {
        $count = $this->followers_count; // Use the followers count accessor

        if ($count >= 1000) {
            return round($count / 1000, 1).'K'; // Format as K
        }

        return $count; // Return the count as is if less than 1000
    }
}
