<?php

namespace TafadzwaLawrence\SocialBeings\Traits;

use TafadzwaLawrence\SocialBeings\Models\Friends;

trait Friendable
{
    /**
     * Get all of the friends for the model.
     */
    public function friendsTo()
    {
        return $this->belongsToMany(get_class($this), 'friends', 'user_id', 'friend_id')
            ->withPivot('accepted')
            ->withTimestamps();
    }

    public function friendsFrom()
    {
        return $this->belongsToMany(get_class($this), 'friends', 'friend_id', 'user_id')
            ->withPivot('accepted')
            ->withTimestamps();
    }

    /**
     * Check if the model is friends with a given user.
     *
     * @param  int  $userId
     * @return bool
     */
    public function isFriendWith($userId)
    {
        return $this->friendsTo()->where('friend_id', $userId)->where('accepted', true)->exists() ||
               $this->friendsFrom()->where('user_id', $userId)->where('accepted', true)->exists();
    }

    /**
     * Get the count of friends.
     *
     * @return int
     */
    public function getFriendsCountAttribute()
    {
        return $this->friendsTo()->where('accepted', true)->count() +
               $this->friendsFrom()->where('accepted', true)->count();
    }

    /**
     * Get all pending friend requests sent to this user.
     */
    public function pendingRequests()
    {
        return $this->friendsFrom()->where('accepted', false);
    }
}
